<?php

namespace App\Http\Controllers;

use App\Models\Komisi;
use App\Models\LaporanPengaduan;
use App\Models\Opd;
use App\Models\Pengaduan;
use App\Models\PengaduanLembagaTerkait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index(Request $request ){
        $pengaduans = Pengaduan::all();

        return view('backend/pengaduans.index',[
           'pengaduans'     =>  $pengaduans,
       ]);
   }

    public function store(Request $request){
        $rules = [
            'nik'                       =>  'required',
            'kategori_pengaduan_id'     =>  'required',
            'isi_pengaduan'             =>  'required',
        ];
        $text = [
            'nik.required'                       =>  'NIK harus diisi',
            'kategori_pengaduan_id.required'     =>  'Kategori Pengaduan harus diisi',
            'isi_pengaduan.required'             =>  'Pengaduan harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = Pengaduan::create([
            'nik'                       =>  $request->nik,
            'kategori_pengaduan_id'     =>  $request->kategori_pengaduan_id,
            'isi_pengaduan'             =>  $request->isi_pengaduan,
            'nomor_tiket_laporan'       =>  $request->nik,
            'hasil_pembahasan'          =>  '-'

        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, Laporan Pengaduan baru berhasil ditambahkan',
                'url'   =>  url('/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Laporan Pengaduan gagal disimpan']);
        }
    }
    public function edit(Pengaduan $pengaduan){

        return $pengaduan;
    }

    public function update(Request $request){
        $rules = [
            'nik'                       =>  'required',
            'kategori_pengaduan_id'     =>  'required',
            'isi_pengaduan'             =>  'required',
        ];
        $text = [
            'nik.required'                       =>  'NIK harus diisi',
            'kategori_pengaduan_id.required'     =>  'Kategori Pengaduan harus dipilih',
            'isi_pengaduan.required'             =>  'Pengaduan harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Pengaduan::where('id',$request->pengaduan_id_edit)->update([
            'nik'                       =>  $request->nik,
            'kategori_pengaduan_id'     =>  $request->kategori_pengaduan_id,
            'isi_pengaduan'             =>  $request->isi_pengaduan,
            'nomor_tiket_laporan'       =>  $request->nik,
            'hasil_pembahasan'          =>  $request->hasil_pembahasan,

        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Laporan Pengaduan diubah',
                'url'   =>  url('/pengaduans/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Laporan Pengaduan gagal diubah']);
        }
    }
    public function delete(Pengaduan $pengaduan){
        $delete = $pengaduan->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, Pengaduan berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('pengaduan')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, Pengaduan gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function detail(Pengaduan $pengaduan){
        $komisis = Komisi::all();
        $laporanPengaduan = $pengaduan->laporanPengaduan;
        $instansiOptions = null;
        if (!empty($laporanPengaduan)) {
            $instansiOptions = PengaduanLembagaTerkait::where('laporan_pengaduan_id',$laporanPengaduan->id)->get();
        }
        return view('backend/pengaduans.detail',[
            'pengaduan' =>  $pengaduan,
            'komisis'   =>  $komisis,
            'laporanPengaduan'  =>  $laporanPengaduan,
            'instansiOptions'   =>  $instansiOptions,
        ]);
    }

    public function detailPost(Request $request, Pengaduan $pengaduan){
        $rules = [
            'opd_id'             =>  'required',
            'pimpinan_rapat'        =>  'required',
            'hasil_kesepakatan'     =>  'required',
            'instansi'              => 'required|array',
            'instansi.*'            => 'required|string',

        ];
        $text = [
            'opd_id.required'                =>  'Opd Harus Diisi',
            'pimpinan_rapat.required'           =>  'Pimpinan Rapat Harus Diisi',
            'hasil_kesepakatan.required'        =>  'Kolom Hasil Kesepakatan Harus Diisi',
            'instansi.required' => 'Minimal pilih satu instansi',
            'instansi.array' => 'Format instansi tidak valid',
            'instansi.*.required' => 'Kolom Instansi harus diisi',
            'instansi.*.string' => 'Format Instansi tidak valid',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        try {
            DB::beginTransaction();
            $path = null;
            if ($request->hasFile('nama_file')) {
                $path = $request->file('nama_file')->store('public/gambar_laporan_pengaduan');
            }
            
            $laporanPengaduan = LaporanPengaduan::create([
                'pengaduan_id'      =>  $pengaduan->id,
                'opd_id'         =>  $request->opd_id,
                'pimpinan_rapat'    =>  $request->pimpinan_rapat,
                'hasil_kesepakatan' =>  $request->hasil_kesepakatan,
                'instansi'          =>  $request->instansi,
                'nama_file'         =>  $path,
            ]);

            $instansiData = $request->input('instansi');

            foreach ($instansiData as $nama) {
                PengaduanLembagaTerkait::create([
                    'laporan_pengaduan_id'  =>  $laporanPengaduan->id,
                    'nama_lembaga'          => $nama,
                ]);
            }

            DB::commit();
            return response()->json([
                'text'  =>  'Yeay, Laporan Pengaduan Berhasil Disimpan',
                'url'   =>  url('/manajemen_pengaduan/'.$pengaduan->id.'/detail'),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['text' => 'Oops, Laporan Pengaduan Gagal Disimpan']);
        }

    }

    public function detailDelete(LaporanPengaduan $laporanPengaduan){
        try {
            DB::beginTransaction();
            $pengaduan_id = $laporanPengaduan->pengaduan_id;
            if (!$laporanPengaduan) {
                // Jika data utama tidak ditemukan, tangani sesuai kebutuhan Anda
                return response()->json(['message' => 'Data not found'], 404);
            }
        
            if ($laporanPengaduan->nama_file) {
                // Hapus gambar terkait jika ada
                Storage::delete($laporanPengaduan->nama_file);
            }
        
            // Hapus data anak terkait
            PengaduanLembagaTerkait::where('laporan_pengaduan_id', $laporanPengaduan->id)->delete();
            // Hapus data utama
            $laporanPengaduan->delete();

            DB::commit();
            return response()->json([
                'text'  =>  'Yeay, Laporan Pengaduan Berhasil Dihapus',
                'url'   =>  url('/manajemen_pengaduan/'.$pengaduan_id.'/detail'),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['text' => 'Oops, Laporan Pengaduan Gagal Dihapus']);
        }
    }

    public function cariOpd(Request $request){
        $opds = Opd::where('komisi_id', $request->komisi_id)->get();
        return $opds;
    }

    public function cetak(){
        $pengaduans = Pengaduan::whereExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('laporan_pengaduans')
                  ->whereColumn('laporan_pengaduans.pengaduan_id', 'pengaduans.id');
        })->get();  
        $pdf = PDF::loadView('backend.pengaduans.cetak',[
            'pengaduans'    =>  $pengaduans,
        ]);
        $pdf->setPaper('a3','portrait');
        return $pdf->stream('data_pengaduan-' . Carbon::now() . '.pdf');
    }
}
