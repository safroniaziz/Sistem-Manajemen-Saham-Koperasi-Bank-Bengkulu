<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use App\Models\KetuaKoperasi;
use App\Models\SahamInstitusi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class SahamInstitusiController extends Controller
{
    public function index(Request $request){
        $nama = $request->query('nama');
        if (!empty($nama)) {
            $sahamInstitusis = SahamInstitusi::whereHas('institusi', function ($query) use ($nama) {
                                                $query->where('nama_institusi','LIKE','%'.$nama.'%')
                                                ->orWhere('nama_investor','LIKE','%'.$nama.'%');;
                                            })
                                            ->orderBy('created_at','desc')->paginate(10);
        }else {
            $sahamInstitusis = SahamInstitusi::orderBy('created_at','desc')->paginate(10);
        }
        return view('saham_instutisis.index',[
            'sahamInstitusis'    =>  $sahamInstitusis,
            'nama'              =>  $nama
        ]);
    }

    public function create(){
        return view('saham_instutisis.create');
    }

    public function store(Request $request){
        $rules = [
            'institusi_id'              => 'required',
            'no_sk3s'                   => 'required',
            'seri_spmpkop'              => 'required',
            'seri_formulir'             => 'required',
            'jumlah_saham'              => 'required|numeric',
            'terbilang_saham'           => 'required',
            'jumlah_lembar'             => 'required|numeric',
            'nomor_saham'               => 'required',
            'tanggal_ditetapkan'        => 'required',
            'jenis_mata_uang'           => 'required',
            'pembayaran_no_rek'         => 'required|numeric',
            'pembayaran_nm_rek'         => 'required',
            'pembayaran_nm_bank'        => 'required',
        ];
        
        $text = [
            'institusi_id.required'             => 'Institusi ID harus diisi',
            'no_sk3s.required'                  => 'Nomor SK3S harus diisi',
            'seri_spmpkop.required'             => 'Seri SPMPKOP harus diisi',
            'seri_formulir.required'            => 'Seri Formulir harus diisi',
            'jumlah_saham.required'             => 'Jumlah Saham harus diisi',
            'jumlah_saham.numeric'              => 'Jumlah Saham harus berupa angka',
            'terbilang_saham.required'          => 'Jumlah Saham (terbilang) harus diisi',
            'jumlah_lembar.required'            => 'Jumlah Lembar harus diisi',
            'jumlah_lembar.numeric'             => 'Jumlah Lembar harus berupa angka',
            'nomor_saham.required'              => 'Nomor Saham harus diisi',
            'tanggal_ditetapkan.required'       => 'Tanggal Ditetapkan harus diisi',
            'jenis_mata_uang.required'          => 'Jenis Mata Uang harus diisi',
            'pembayaran_no_rek.required'        => 'Nomor Rekening Pembayaran harus diisi',
            'pembayaran_no_rek.numeric'         => 'Nomor Rekening Pembayaran harus berupa angka',
            'pembayaran_nm_rek.required'        => 'Nama Rekening Pembayaran harus diisi',
            'pembayaran_nm_bank.required'       => 'Nama Bank Pembayaran harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()], 422);
        }

        $simpan = SahamInstitusi::create([
            'institusi_id'              => $request->institusi_id,
            'nomor_sk3s'                => $request->no_sk3s,
            'seri_spmpkop'              => $request->seri_spmpkop,
            'seri_formulir'             => $request->seri_formulir,
            'jumlah_saham'              => $request->jumlah_saham,
            'terbilang_saham'           => $request->terbilang_saham,
            'jumlah_lembar'             => $request->jumlah_lembar,
            'nomor_saham'               => $request->nomor_saham,
            'tanggal_ditetapkan'        => $request->tanggal_ditetapkan,
            'jenis_mata_uang'           => $request->jenis_mata_uang,
            'pembayaran_no_rek'         => $request->pembayaran_no_rek,
            'pembayaran_nm_rek'         => $request->pembayaran_nm_rek,
            'pembayaran_nm_bank'        => $request->pembayaran_nm_bank,
        ]);
        

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, Saham institusi berhasil ditambahkan',
                'url'   =>  url('/saham_institusi/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Saham institusi gagal ditambahkan']);
        }
    }

    public function cariInstitusi(Request $request){
        return Institusi::where('nama_investor','LIKE','%'.$request->keyword.'%')
                        ->orWhere('nama_institusi','LIKE','%'.$request->keyword.'%')->get();
    }

    public function edit(SahamInstitusi $sahamInstitusi){
        $data = SahamInstitusi::with(['institusi'])->where('id',$sahamInstitusi->id)->first();
        return view('saham_instutisis.edit',[
            'data' =>  $data,
        ]);
    }

    public function update(Request $request){
        $rules = [
            'institusi_id'              => 'required',
            'no_sk3s'                   => 'required',
            'seri_spmpkop'              => 'required',
            'seri_formulir'             => 'required',
            'jumlah_saham'              => 'required|numeric',
            'terbilang_saham'           => 'required',
            'jumlah_lembar'             => 'required|numeric',
            'nomor_saham'               => 'required',
            'tanggal_ditetapkan'        => 'required',
            'jenis_mata_uang'           => 'required',
            'pembayaran_no_rek'         => 'required|numeric',
            'pembayaran_nm_rek'         => 'required',
            'pembayaran_nm_bank'        => 'required',
        ];
        
        $text = [
            'institusi_id.required'             => 'Institusi ID harus diisi',
            'no_sk3s.required'                  => 'Nomor SK3S harus diisi',
            'seri_spmpkop.required'             => 'Seri SPMPKOP harus diisi',
            'seri_formulir.required'            => 'Seri Formulir harus diisi',
            'jumlah_saham.required'             => 'Jumlah Saham harus diisi',
            'jumlah_saham.numeric'              => 'Jumlah Saham harus berupa angka',
            'terbilang_saham.required'          => 'Jumlah Saham (terbilang) harus diisi',
            'jumlah_lembar.required'            => 'Jumlah Lembar harus diisi',
            'jumlah_lembar.numeric'             => 'Jumlah Lembar harus berupa angka',
            'nomor_saham.required'              => 'Nomor Saham harus diisi',
            'tanggal_ditetapkan.required'       => 'Tanggal Ditetapkan harus diisi',
            'jenis_mata_uang.required'          => 'Jenis Mata Uang harus diisi',
            'pembayaran_no_rek.required'        => 'Nomor Rekening Pembayaran harus diisi',
            'pembayaran_no_rek.numeric'         => 'Nomor Rekening Pembayaran harus berupa angka',
            'pembayaran_nm_rek.required'        => 'Nama Rekening Pembayaran harus diisi',
            'pembayaran_nm_bank.required'       => 'Nama Bank Pembayaran harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()], 422);
        }

        $update = SahamInstitusi::where('id',$request->id)->update([
            'institusi_id'              => $request->institusi_id,
            'nomor_sk3s'                => $request->no_sk3s,
            'seri_spmpkop'              => $request->seri_spmpkop,
            'seri_formulir'             => $request->seri_formulir,
            'jumlah_saham'              => $request->jumlah_saham,
            'terbilang_saham'           => $request->terbilang_saham,
            'jumlah_lembar'             => $request->jumlah_lembar,
            'nomor_saham'               => $request->nomor_saham,
            'tanggal_ditetapkan'        => $request->tanggal_ditetapkan,
            'jenis_mata_uang'           => $request->jenis_mata_uang,
            'pembayaran_no_rek'         => $request->pembayaran_no_rek,
            'pembayaran_nm_rek'         => $request->pembayaran_nm_rek,
            'pembayaran_nm_bank'        => $request->pembayaran_nm_bank,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, saham institusi berhasil diupdate',
                'url'   =>  url('/saham_institusi/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, saham institusi gagal diupdate']);
        }
    }

    public function delete(SahamInstitusi $sahamInstitusi){
        $delete = $sahamInstitusi->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, Saham institusi Berhasil Dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('sahamInstitusi')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, Saham institusi Bagal Dihapus',
                'alert-type' => 'error'
            );
            return redirect()->route('sahamInstitusi')->with($notification);
        }
    }

    public function cetakSk3s(SahamInstitusi $sahamInstitusi){
        $ketua = KetuaKoperasi::first();
        $tanggalDitetapkan = Carbon::parse($sahamInstitusi->tanggal_ditetapkan);
        $pdf = Pdf::loadView('saham_instutisis._cetak_sk3s',[
            'sahamInstitusi'    =>  $sahamInstitusi,
            'ketua'    =>  $ketua,
            'tanggalDitetapkan'    =>  $tanggalDitetapkan,
        ]);
        $pdf->setPaper('a4','portrait');
        return $pdf->stream('data_pengaduan-' . Carbon::now() . '.pdf');
    }

    public function cetakSpmpkop(SahamInstitusi $sahamInstitusi){
        // $barcode = Barcodes::where('status','aktif')->select('nm_file')->first();
        $ketua = KetuaKoperasi::select('nama_ketua_koperasi')->first();
        $sk3s = SahamInstitusi::with(['institusi'])
                                ->where('id',$sahamInstitusi->id)
                                ->first();
        $pdf = PDF::loadView('saham_instutisis._cetak_spmpkop',compact('ketua','sk3s'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

    public function alihkan(SahamInstitusi $sahamInstitusi){
        $data = SahamInstitusi::with(['institusi'])->where('id',$sahamInstitusi->id)->first();
        return view('saham_instutisis.alihkan',[
            'data' =>  $data,
        ]);
    }

    public function alihkanPost(Request $request, SahamInstitusi $sahamInstitusi){
        $rules = [
            'institusi_pembeli_id'             => 'required',
            'no_sk3s'                 => 'required',
            'seri_spmpkop'            => 'required',
            'seri_formulir'           => 'required',
            'jumlah_saham'            => 'required|numeric',
            'jumlah_saham_terbilang'  => 'required',
            'jenis_mata_uang'         => 'required',
            'pembayaran_nomor_rekening'   => 'required|numeric',
            'pembayaran_nama_rekening'    => 'required',
            'pembayaran_nama_bank'   => 'required',
            'jumlah_lembar'           => 'required|numeric',
            'nomor_saham'            => 'required',
            'tanggal_ditetapkan'      => 'required',
            'perubahan_ke'      => 'required',
        ];
        
        $text = [
            'investor_pembeli_id.required'             => 'Investor Pembeli ID harus diisi',
            'no_sk3s.required'                 => 'Nomor SK3S Baru harus diisi',
            'no_sk3s_lama.required'                 => 'Nomor SK3S Lama harus diisi',
            'seri_spmpkop.required'            => 'Seri SPMPKOP harus diisi',
            'seri_formulir.required'           => 'Seri Formulir harus diisi',
            'jumlah_saham.required'            => 'Jumlah Saham harus diisi',
            'jumlah_saham.numeric'             => 'Jumlah Saham harus berupa angka',
            'jumlah_saham_terbilang.required'  => 'Jumlah Saham (terbilang) harus diisi',
            'jenis_mata_uang.required'         => 'Jenis Mata Uang harus diisi',
            'pembayaran_nomor_rekening.required'   => 'Nomor Rekening Pembayaran harus diisi',
            'pembayaran_nomor_rekening.numeric'    => 'Nomor Rekening Pembayaran harus berupa angka',
            'pembayaran_nama_rekening.required'    => 'Nama Rekening Pembayaran harus diisi',
            'pembayaran_nama_bank.required'   => 'Nama Bank Pembayaran harus diisi',
            'jumlah_lembar.required'           => 'Jumlah Lembar harus diisi',
            'jumlah_lembar.numeric'            => 'Jumlah Lembar harus berupa angka',
            'nomor_saham.required'            => 'Nomor Saham harus diisi',
            'tanggal_ditetapkan.required'      => 'Tanggal Ditetapkan harus diisi',
            'perubahan_ke.required'                      =>  'Perubahan Ke harus Diisi'
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        SahamInstitusi::create([
            'institusi_id_lama'  =>  $sahamInstitusi->institusi->id,
            'institusi_id' => $request->institusi_pembeli_id,
            'nomor_sk3s_lama'   =>  $request->no_sk3s_lama,
            'nomor_sk3s' => $request->no_sk3s,
            'seri_spmpkop' => $request->seri_spmpkop,
            'seri_formulir' => $request->seri_formulir,
            'jumlah_saham' => $request->jumlah_saham,
            'terbilang_saham' => $request->jumlah_saham_terbilang,
            'jenis_mata_uang' => $request->jenis_mata_uang,
            'pembayaran_no_rek' => $request->pembayaran_nomor_rekening,
            'pembayaran_nm_rek' => $request->pembayaran_nama_rekening,
            'pembayaran_nm_bank' => $request->pembayaran_nama_bank,
            'jumlah_lembar' => $request->jumlah_lembar,
            'nomor_saham' => $request->nomor_saham,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
            'perubahan_ke'  =>  $request->perubahan_ke,
        ]);
        
        if ($sahamInstitusi->jumlah_saham - $request->jumlah_saham < 1) {
            $sahamInstitusi->delete();
        }else {
            $sahamInstitusi->update([
                'jumlah_saham'  =>  $sahamInstitusi->jumlah_saham - $request->jumlah_saham,
            ]);
        }

        return response()->json([
            'text'  =>  'Yeay, saham institusi berhasil ditambahkan',
            'url'   =>  url('/saham_institusi/'),
        ]);
    }
}
