<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\KetuaKoperasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SahamInvestor;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

class SahamInvestorController extends Controller
{
    public function index(Request $request){
        $nama = $request->query('nama');
        if (!empty($nama)) {
            $sahamInvestors = SahamInvestor::whereHas('investor', function ($query) use ($nama) {
                                                $query->where('nama_investor','LIKE','%'.$nama.'%');
                                            })
                                            ->orderBy('created_at','desc')->paginate(10);
        }else {
            $sahamInvestors = SahamInvestor::orderBy('created_at','desc')->paginate(10);
        }
        return view('saham_investors.index',[
            'sahamInvestors'    =>  $sahamInvestors,
            'nama'              =>  $nama
        ]);
    }

    public function create(){
        return view('saham_investors.create');
    }

    public function store(Request $request){
        $rules = [
            'investor_id'             => 'required',
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
        ];
        
        $text = [
            'investor_id.required'             => 'Investor ID harus diisi',
            'no_sk3s.required'                 => 'Nomor SK3S harus diisi',
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
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = SahamInvestor::create([
            'investor_id' => $request->investor_id,
            'nomor_sk3s' => $request->no_sk3s,
            'seri_spmpkop' => $request->seri_spmpkop,
            'seri_formulir' => $request->seri_formulir,
            'jumlah_saham' => $request->jumlah_saham,
            'jumlah_saham_terbilang' => $request->jumlah_saham_terbilang,
            'jenis_mata_uang' => $request->jenis_mata_uang,
            'pembayaran_nomor_rekening' => $request->pembayaran_nomor_rekening,
            'pembayaran_nama_rekening' => $request->pembayaran_nama_rekening,
            'pembayaran_nama_bank' => $request->pembayaran_nama_bank,
            'jumlah_lembar' => $request->jumlah_lembar,
            'nomor_saham' => $request->nomor_saham,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
        ]);
        

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, Saham investor berhasil ditambahkan',
                'url'   =>  url('/saham_investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Saham investor gagal ditambahkan']);
        }
    }

    public function edit(SahamInvestor $sahamInvestor){
        $data = SahamInvestor::with(['investor'])->where('id',$sahamInvestor->id)->first();
        return view('saham_investors.edit',[
            'data' =>  $data,
        ]);
    }

    public function update(Request $request){
        $rules = [
            'investor_id'             => 'required',
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
        ];
        
        $text = [
            'investor_id.required'             => 'Investor ID harus diisi',
            'no_sk3s.required'                 => 'Nomor SK3S harus diisi',
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
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = SahamInvestor::where('id',$request->id)->update([
            'investor_id' => $request->investor_id,
            'nomor_sk3s' => $request->no_sk3s,
            'seri_spmpkop' => $request->seri_spmpkop,
            'seri_formulir' => $request->seri_formulir,
            'jumlah_saham' => $request->jumlah_saham,
            'jumlah_saham_terbilang' => $request->jumlah_saham_terbilang,
            'jenis_mata_uang' => $request->jenis_mata_uang,
            'pembayaran_nomor_rekening' => $request->pembayaran_nomor_rekening,
            'pembayaran_nama_rekening' => $request->pembayaran_nama_rekening,
            'pembayaran_nama_bank' => $request->pembayaran_nama_bank,
            'jumlah_lembar' => $request->jumlah_lembar,
            'nomor_saham' => $request->nomor_saham,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Saham investor berhasil diupdate',
                'url'   =>  url('/saham_investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Saham investor gagal diupdate']);
        }
    }

    public function delete(SahamInvestor $sahamInvestor){
        $delete = $sahamInvestor->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, Saham Investor Berhasil Dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('sahamInvestor')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, Saham Investor Bagal Dihapus',
                'alert-type' => 'error'
            );
            return redirect()->route('sahamInvestor')->with($notification);
        }
    }

    public function cariInvestor(Request $request){
        return Investor::where('nama_investor','LIKE','%'.$request->keyword.'%')->get();
    }

    public function cetakSk3s(SahamInvestor $sahamInvestor){
        $ketua = KetuaKoperasi::first();
        $tanggalDitetapkan = Carbon::parse($sahamInvestor->tanggal_ditetapkan);
        $pdf = Pdf::loadView('saham_investors._cetak_sk3s',[
            'sahamInvestor'    =>  $sahamInvestor,
            'ketua'    =>  $ketua,
            'tanggalDitetapkan'    =>  $tanggalDitetapkan,
        ]);
        $pdf->setPaper('a4','portrait');
        return $pdf->stream('data_pengaduan-' . Carbon::now() . '.pdf');
    }

    public function cetakSpmpkop(SahamInvestor $sahamInvestor){
        // $barcode = Barcodes::where('status','aktif')->select('nm_file')->first();
        $ketua = KetuaKoperasi::select('nama_ketua_koperasi')->first();
        $sk3s = SahamInvestor::with(['investor'])
                                ->where('id',$sahamInvestor->id)
                                ->first();
        $pdf = PDF::loadView('saham_investors._cetak_spmpkop',compact('ketua','sk3s'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

    public function alihkan(SahamInvestor $sahamInvestor){
        $data = SahamInvestor::with(['investor'])->where('id',$sahamInvestor->id)->first();
        return view('saham_investors.alihkan',[
            'data' =>  $data,
        ]);
    }

    public function alihkanPost(Request $request, SahamInvestor $sahamInvestor){
        $rules = [
            'investor_pembeli_id'             => 'required',
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

        SahamInvestor::create([
            'investor_id_lama'  =>  $sahamInvestor->investor->id,
            'investor_id' => $request->investor_pembeli_id,
            'nomor_sk3s_lama'   =>  $request->no_sk3s_lama,
            'nomor_sk3s' => $request->no_sk3s,
            'seri_spmpkop' => $request->seri_spmpkop,
            'seri_formulir' => $request->seri_formulir,
            'jumlah_saham' => $request->jumlah_saham,
            'jumlah_saham_terbilang' => $request->jumlah_saham_terbilang,
            'jenis_mata_uang' => $request->jenis_mata_uang,
            'pembayaran_nomor_rekening' => $request->pembayaran_nomor_rekening,
            'pembayaran_nama_rekening' => $request->pembayaran_nama_rekening,
            'pembayaran_nama_bank' => $request->pembayaran_nama_bank,
            'jumlah_lembar' => $request->jumlah_lembar,
            'nomor_saham' => $request->nomor_saham,
            'tanggal_ditetapkan' => $request->tanggal_ditetapkan,
            'perubahan_ke'  =>  $request->perubahan_ke,
        ]);
        
        if ($sahamInvestor->jumlah_saham - $request->jumlah_saham < 1) {
            $sahamInvestor->delete();
        }else {
            $sahamInvestor->update([
                'jumlah_saham'  =>  $sahamInvestor->jumlah_saham - $request->jumlah_saham,
            ]);
        }

        return response()->json([
            'text'  =>  'Yeay, Saham investor berhasil ditambahkan',
            'url'   =>  url('/saham_investor/'),
        ]);
    }
}
