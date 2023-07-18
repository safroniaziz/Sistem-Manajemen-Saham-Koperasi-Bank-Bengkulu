<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\DokumenReses;
use App\Models\Opd;
use App\Models\Komisi;
use App\Models\LaporanAspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDF;

class AspirasiController extends Controller
{
    public function index(Request $request ){
        $aspirasis = Aspirasi::query();
        $aspirasis = Aspirasi::query();
        $user = Auth::user();

        // Check if the authenticated user has the 'anggota' role
        if ($user->hasRole('anggota')) {
            // Filter the Aspirasi by user_id
            $aspirasis->where('user_id', $user->id);
        }

        // Retrieve the filtered Aspirasi data and other related data
        $aspirasis = $aspirasis->get();
        $opds = Opd::all();
        $komisis = Komisi::all();

        return view('backend/aspirasis.index', [
            'aspirasis' => $aspirasis,
            'opds' => $opds,
            'komisis' => $komisis,
        ]);
    }

    public function store(Request $request){
        $rules = [
                'nik'                       =>  'required',
                'dapil_id'                  =>  'required',
                'user_id'                   =>  'required',
                'laporan_aspirasi'          =>  'required',
                'volume'                    =>  'required',
                'satuan_volume_id'          =>  'required',
                'opd_id'                    =>  'required',
                'usulan'                    =>  'required',
                'alamat_usulan'             =>  'required',
        ];
        $text = [
                'nik.required'                       =>  'NIK harus diisi',
                'dapil_id.required'                  =>  'Dapil harus dipilih',
                'user_id.required'                   =>  'Anggota DPRD harus dipilih',
                'laporan_aspirasi.required'          =>  'Laporan Aspirasi harus diisi',
                'satuan_volume_id.required'          =>  'Volume Satuan harus dipilih',
                'opd_id.required'                    =>  'OPD harus dipilih',
                'usulan.required'                    =>  'Usulan harus diisi',
                'alamat_usulan.required'             =>  'Alamat Usulan harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = Aspirasi::create([
            'nik'                       =>  $request->nik,
            'dapil_id'                  =>  $request->dapil_id,
            'user_id'                   =>  $request->user_id,
            'laporan_aspirasi'          =>  $request->laporan_aspirasi,
            'volume'                    =>  $request->volume,
            'satuan_volume_id'          =>  $request->satuan_volume_id,
            'opd_id'                    =>  $request->opd_id,
            'usulan'                    =>  $request->usulan,
            'usulan_ke'                 =>  $request->usulan_ke,
            'alamat_usulan'             =>  $request->alamat_usulan,
            'status'                    =>  'pengajuan usulan',
        ]);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, Aspirasi baru berhasil ditambahkan',
                'url'   =>  url('/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Aspirasi gagal disimpan']);
        }
    }

    public function detail(Aspirasi $aspirasi){
        $komisis = Komisi::all();
        $dokumenReses = DokumenReses::all();
        $aspirasi->load('laporanAspirasi');
        $laporanAspirasi = $aspirasi->laporanAspirasi;
        return view('backend/aspirasis.detail',[
            'aspirasi' =>  $aspirasi,
            'komisis' =>  $komisis,
            'dokumenReses' =>  $dokumenReses,
            'laporanAspirasi' =>  $laporanAspirasi,
        ]);
    }

    public function update(Request $request){
        $rules = [
            'masyarakat_nik'            =>  'required',
            'dapil_id'                  =>  'required',
            'user_id'                   =>  'required',
            'laporan_aspirasi'          =>  'required',
            'volume'                    =>  'required',
            'satuan_volume_id'          =>  'required',
            'opd_id'                    =>  'required',
            'usulan'                    =>  'required',
            'alamat_usulan'             =>  'required',
        ];
        $text = [
            'masyarakat_nik.required'            =>  'NIK harus diisi',
            'dapil_id.required'                  =>  'Dapil harus dipilih',
            'user_id.required'                   =>  'Anggota DPRD harus dipilih',
            'laporan_aspirasi.required'          =>  'Laporan Aspirasi harus diisi',
            'volume.required'                    =>  'Volume harus diisi',
            'satuan_volume_id.required'          =>  'Satuan Volume harus dipilih',
            'opd_id.required'                    =>  'OPD harus dipilih',
            'usulan.required'                    =>  'Usulan harus diisi',
            'alamat_usulan.required'             =>  'Alamat Usulan harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = Aspirasi::where('id',$request->aspirasi_id_edit)->update([
            'masyarakat_nik'            =>  $request->masyarakat_nik,
            'dapil_id'                  =>  $request->dapil_id,
            'user_id'                   =>  $request->user_id,
            'komisi_id'                 =>  $request->komisi_id,
            'laporan_aspirasi'          =>  $request->laporan_aspirasi,
            'volume'                    =>  $request->volume,
            'satuan_volume_id'          =>  $request->satuan_volume_id,
            'opd_id'                    =>  $request->opd_id,
            'dokumen_reses_id'          =>  $request->dokumen_reses_id,
            'komisi_id'                 =>  $request->komisi_id,
            'usulan'                    =>  $request->usulan,
            'alamat_usulan'             =>  $request->alamat_usulan,
            'usulan_ke'                 =>  $request->usulan_ke,
            'opd_akhir_id'              =>  $request->opd_akhir_id,
            'status'                    =>  $request->status,
            'catatan'                   =>  $request->catatan,
            'rekomendasi_sekwan'        =>  $request->rekomendasi_sekwan,
            'rekomendasi_mitra'         =>  $request->rekomendasi_mitra,
            'rekomendasi_skpd'          =>  $request->rekomendasi_skpd,
            'rekomendasi_tapd'          =>  $request->rekomendasi_tapd,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Aspirasi diubah',
                'url'   =>  url('/manajemen_aspirasi/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Aspirasi gagal diubah']);
        }
    }
    public function delete(Aspirasi $aspirasi){
        $delete = $aspirasi->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, Aspirasi berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('aspirasi')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, Aspirasi gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function detailPost(Request $request, Aspirasi $aspirasi){
        $rules = [
            'dokumen_reses_id'      =>  'required',
            'komisi_id'             =>  'required',
            'opd_akhir_id'          =>  'required',
            'catatan'               => 'required',
            'status'                => 'required',
            'rekomendasi_sekwan'    => 'required',
            'rekomendasi_mitra'     => 'required',
            'rekomendasi_skpd'      => 'required',
            'rekomendasi_tapd'      => 'required',
        ];
        $text = [
            'dokumen_reses_id.required'                 =>  'Dokumen Reses Harus Diisi',
            'komisi_id.required'                        =>  'Komisi Harus Diisi',
            'opd_akhir_id.required'                     =>  'OPD Akhir Harus Diisi',
            'catatan.required'                          =>  'Catatan Harus Diisi',
            'status.required'                          =>  'Catatan Harus Diisi',
            'rekomendasi_sekwan.required'               =>  'Rekomendasi Sekwan Harus Diisi',
            'rekomendasi_mitra.*.required'              =>  'Rekomendasi Mitra Harus Diisi',
            'rekomendasi_skpd.required'                 =>  'Rekomendasi SKPD Harus Diisi',
            'rekomendasi_tapd.required'                 =>  'Rekomendasi TAPD Harus Diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }
        try {
            DB::beginTransaction();
          
            $laporanAspirasi = LaporanAspirasi::create([
                'aspirasi_id'           =>  $aspirasi->id,
                'dokumen_reses_id'      =>  $request->dokumen_reses_id,
                'komisi_id'             =>  $request->komisi_id,
                'opd_akhir_id'          =>  $request->opd_akhir_id,
                'catatan'               =>  $request->catatan,
                'status'                =>  $request->status,
                'rekomendasi_sekwan'    =>  $request->rekomendasi_sekwan,
                'rekomendasi_mitra'     =>  $request->rekomendasi_mitra,
                'rekomendasi_skpd'      =>  $request->rekomendasi_skpd,
                'rekomendasi_tapd'      =>  $request->rekomendasi_tapd,
            ]);

            $aspirasi->update([
                'status'                =>  $request->status,
            ]);

            DB::commit();
            return response()->json([
                'text'  =>  'Yeay, Laporan Aspirasi Berhasil Disimpan',
                'url'   =>  url('/manajemen_aspirasi/'.$aspirasi->id.'/detail'),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['text' => 'Oops, Laporan Aspirasi Gagal Disimpan']);
        }

    }

    public function detailDelete(LaporanAspirasi $laporanAspirasi){
        try {
            DB::beginTransaction();
            $aspirasi_id = $laporanAspirasi->aspirasi_id;
            if (!$laporanAspirasi) {
                // Jika data utama tidak ditemukan, tangani sesuai kebutuhan Anda
                return response()->json(['message' => 'Data not found'], 404);
            }
        
            $laporanAspirasi->delete();

            DB::commit();
            return response()->json([
                'text'  =>  'Yeay, Laporan Aspirasi Berhasil Dihapus',
                'url'   =>  url('/manajemen_aspirasi/'.$aspirasi_id.'/detail'),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['text' => 'Oops, Laporan Aspirasi Gagal Dihapus']);
        }
    }

    public function cariOpd(Request $request){
        $opds = Opd::where('komisi_id', $request->komisi_id)->get();
        return $opds;
    }

    public function cetak(){
        $aspirasis = Aspirasi::whereExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('laporan_aspirasis')
                  ->whereColumn('laporan_aspirasis.aspirasi_id', 'aspirasis.id');
        })->get();  
        $pdf = PDF::loadView('backend.aspirasis.cetak',[
            'aspirasis'    =>  $aspirasis,
        ]);
        $pdf->setPaper('a3','portrait');
        return $pdf->stream('data_aspirasis-' . \Carbon\Carbon::now() . '.pdf');
    }
}
