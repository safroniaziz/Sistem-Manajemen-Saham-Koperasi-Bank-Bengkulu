<?php

namespace App\Http\Controllers;

use App\Models\AgenPemasaran;
use App\Models\DataKeuanganInstitusi;
use App\Models\DokumenPendukungInstitusi;
use App\Models\Institusi;
use App\Models\InstruksiPembayaranInstitusi;
use App\Models\PejabatBerwenang;
use App\Models\PemegangSahamInstitusi;
use App\Models\PenerimaKuasaTransaksiInstitusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstitusiController extends Controller
{
    public function index(Request $request){
        $nama = $request->query('nama');
        if (!empty($nama)) {
            $institusis = Institusi::where('nama_investor','LIKE','%'.$nama.'%')
                                    ->orWhere('nama_institusi','LIKE','%'.$nama.'%')
                                    ->orderBy('created_at','desc')->paginate(10);
        }else {
            $institusis = Institusi::orderBy('created_at','desc')->paginate(10);
        }
        return view('institusi.index',[
            'institusis' =>  $institusis,
            'nama' =>  $nama,
        ]);
    }

    public function create(){
        $pejabatBerwenangs = PejabatBerwenang::all();
        $agenPemasarans = AgenPemasaran::all();
        return view('institusi.create',[
            'pejabatBerwenangs' =>  $pejabatBerwenangs,
            'agenPemasarans' =>  $agenPemasarans,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_investor' => 'required',
            'nomor_register' => 'required',
            'nomor_cif' => 'required',
            'nama_institusi' => 'required',
            'kota_institusi' => 'required',
            'provinsi_institusi' => 'required',
            'negara_institusi' => 'required',
            'kode_pos_institusi' => 'required',
            'email_kantor' => 'required|email',
            'telephone_kantor' => 'required',
            'bidang_usaha' => 'required',
            'nomor_akta_pendirian' => 'required',
            'nomor_akta_perubahan_terakhir' => 'required',
            'nomor_npwp' => 'required',
            'nomor_siup' => 'required',
            'nomor_skdp' => 'required',
            'nomor_tdp' => 'required',
            'nama_pemegang_saham' => 'required',
            'komposisi_pemegang_saham' => 'required',
            'tanggal_pernyataan' => 'required|date',
            'yang_menyatakan' => 'required',
            'nama_kuasa' => 'required',
            'nomor_identitas_kuasa' => 'required',
            'tgl_kadaluarsa_identitas_kuasa' => 'required|date',
            'jabatan_kuasa' => 'required',
            'telephone_kuasa' => 'required',
            'aset_keuangan_tahun_1' => 'required',
            'aset_keuangan_tahun_2' => 'required',
            'aset_keuangan_tahun_3' => 'required',
            'laba_keuangan_tahun_1' => 'required',
            'laba_keuangan_tahun_2' => 'required',
            'laba_keuangan_tahun_3' => 'required',
            'sumber_dana' => 'required',
            'tujuan_investasi' => 'required',
            'nama_pemilik_bank' => 'required',
            'nama_bank' => 'required',
            'nomor_rekening' => 'required',
            'kelengkapan_dokumen' => 'required',
            'profil_resiko' => 'required',
            'bukti_setoran' => 'required',
            'ttd_penerima_kuasa' => 'required',
            'fatca' => 'nullable',
            'persetujuan' => 'required',
        ], [
            'required' => ':attfribute harus diisi.',
            'email' => ':attribute harus berupa alamat email yang valid.',
            'date' => ':attribute harus dalam format tanggal yang benar.',
            'numeric' => ':attribute harus berupa angka.',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $institusi = Institusi::create([
            'nama_investor' =>  $request->nama_investor,
            'nomor_register'    =>  $request->nomor_register,
            'nomor_cif'    =>  $request->nomor_register,
            'agen_pemasaran_id' =>  $request->agen_pemasaran_id,
            'pejabat_berwenang_id_1' =>  $request->pejabat_berwenang_id1,
            'pejabat_berwenang_id_2' =>  $request->pejabat_berwenang_id2,
            'nama_institusi'    =>  $request->nama_institusi,
            'kota_institusi'    =>  $request->kota_institusi,
            'provinsi_institusi'    =>  $request->provinsi_institusi,
            'negara_institusi'  =>  $request->negara_institusi,
            'kode_pos_institusi'    =>  $request->kode_pos_institusi,
            'email_kantor'  =>  $request->email_kantor,
            'telephone_kantor'  =>  $request->telephone_kantor,
            'domisili'  =>  $request->domisili,
            'karakteristik' =>  $request->karakteristik,
            'tipe_perusahaan'   =>  $request->tipe_perusahaan,
            'bidang_usaha'  =>  $request->bidang_usaha,
            'nomor_akta_pendirian'  =>  $request->nomor_akta_pendirian,
            'tgl_akta_pendirian'    =>  $request->tgl_akta_pendirian,
            'tgl_akta_perubahan_terakhir'   =>  $request->tgl_akta_perubahan_terakhir,
            'nomor_akta_perubahan_terakhir' =>  $request->nomor_akta_perubahan_terakhir,
            'nomor_npwp'    =>  $request->nomor_npwp,
            'tgl_registrasi_npwp'   =>  $request->tgl_registrasi_npwp,
            'nomor_siup'    =>  $request->nomor_siup,
            'tgl_kadaluarsa_siup'   =>  $request->tgl_kadaluarsa_siup,
            'nomor_skdp'    =>  $request->nomor_skdp,
            'tgl_kadaluarsa_skdp'   =>  $request->tgl_kadaluarsa_skdp,
            'nomor_tdp' =>  $request->nomor_tdp,
            'tgl_kadaluarsa_tdp'    =>  $request->tgl_kadaluarsa_tdp,
            'nomor_izin_pma'    =>  $request->nomor_izin_pma,
        ]);

        $pemegangSaham = PemegangSahamInstitusi::create([
            'institusi_id'   =>  $institusi->id,
            'nama_pemegang_saham' =>  $request->nama_pemegang_saham,
            'komposisi_pemegang_saham'    =>  $request->komposisi_pemegang_saham,
            'tanggal_pernyataan'  =>  $request->tanggal_pernyataan,
            'yang_menyatakan' =>  $request->yang_menyatakan,
        ]);

        $penerimaKuasa = PenerimaKuasaTransaksiInstitusi::create([
            'institusi_id'   =>  $institusi->id,
            'nama_kuasa'    =>  $request->nama_kuasa,
            'nomor_identitas' =>  $request->nomor_identitas_kuasa,
            'tgl_kadaluarsa_identitas'    =>  $request->tgl_kadaluarsa_identitas_kuasa,
            'jabatan' =>  $request->jabatan_kuasa,
            'telephone'   =>  $request->telephone_kuasa,
        ]);

        $keuangan = DataKeuanganInstitusi::create([
            'institusi_id'   =>  $institusi->id,
            'aset_keuangan_tahun_1' =>  $request->aset_keuangan_tahun_1,
            'aset_keuangan_tahun_2' =>  $request->aset_keuangan_tahun_2,
            'aset_keuangan_tahun_3' =>  $request->aset_keuangan_tahun_3,
            'laba_keuangan_tahun_1' =>  $request->laba_keuangan_tahun_1,
            'laba_keuangan_tahun_2' =>  $request->laba_keuangan_tahun_2,
            'laba_keuangan_tahun_3' =>  $request->laba_keuangan_tahun_3,
            'sumber_dana'   =>  $request->sumber_dana,
            'tujuan_investasi'  =>  $request->tujuan_investasi,
        ]);
        
        $instruksiPembayaran = InstruksiPembayaranInstitusi::create([
            'institusi_id'   =>  $institusi->id,
            'nama_pemilik_bank' =>  $request->nama_pemilik_bank,
            'nama_bank' =>  $request->nama_bank,
            'nomor_rekening'    =>  $request->nomor_rekening,
        ]);

        $dokumenPendukung = DokumenPendukungInstitusi::create([
            'institusi_id'   =>  $institusi->id,
            'kelengkapan_dokumen'   =>  $request->kelengkapan_dokumen,
            'profil_resiko' =>  $request->profil_resiko,
            'bukti_setoran' =>  $request->bukti_setoran,
            'ttd_penerima_kuasa'    =>  $request->ttd_penerima_kuasa,
            'fatca' =>  $request->fatca,
            'persetujuan'   =>  $request->persetujuan,
        ]);

        return response()->json([
            'text'  =>  'Yeay, data rekening institusi berhasil disimpan',
            'url'   =>  url('/institusi/'),
        ]);
    }

    public function edit(Institusi $institusi){
        $institusi = Institusi::with(['dataKeuangan','dokumenPendukung','instruksiPembayaran','pemegangSaham','penerimaKuasaTransaksi'])->where('id',$institusi->id)->first();
        $pejabatBerwenangs = PejabatBerwenang::all();
        $agenPemasarans = AgenPemasaran::all();
        return view('institusi.edit',[
            'institusi'  =>  $institusi,
            'pejabatBerwenangs'  =>  $pejabatBerwenangs,
            'agenPemasarans'  =>  $agenPemasarans,
        ]);
    }

    public function update(Request $request, Institusi $institusi){
        $validator = Validator::make($request->all(), [
            'nama_investor' => 'required',
            'nomor_register' => 'required',
            'nomor_cif' => 'required',
            'nama_institusi' => 'required',
            'kota_institusi' => 'required',
            'provinsi_institusi' => 'required',
            'negara_institusi' => 'required',
            'kode_pos_institusi' => 'required',
            'email_kantor' => 'required|email',
            'telephone_kantor' => 'required',
            'bidang_usaha' => 'required',
            'nomor_akta_pendirian' => 'required',
            'nomor_akta_perubahan_terakhir' => 'required',
            'nomor_npwp' => 'required',
            'nomor_siup' => 'required',
            'nomor_skdp' => 'required',
            'nomor_tdp' => 'required',
            'nama_pemegang_saham' => 'required',
            'komposisi_pemegang_saham' => 'required',
            'tanggal_pernyataan' => 'required|date',
            'yang_menyatakan' => 'required',
            'nama_kuasa' => 'required',
            'nomor_identitas_kuasa' => 'required',
            'tgl_kadaluarsa_identitas_kuasa' => 'required|date',
            'jabatan_kuasa' => 'required',
            'telephone_kuasa' => 'required',
            'aset_keuangan_tahun_1' => 'required',
            'aset_keuangan_tahun_2' => 'required',
            'aset_keuangan_tahun_3' => 'required',
            'laba_keuangan_tahun_1' => 'required',
            'laba_keuangan_tahun_2' => 'required',
            'laba_keuangan_tahun_3' => 'required',
            'sumber_dana' => 'required',
            'tujuan_investasi' => 'required',
            'nama_pemilik_bank' => 'required',
            'nama_bank' => 'required',
            'nomor_rekening' => 'required',
            'kelengkapan_dokumen' => 'required',
            'profil_resiko' => 'required',
            'bukti_setoran' => 'required',
            'ttd_penerima_kuasa' => 'required',
            'fatca' => 'nullable',
            'persetujuan' => 'required',
        ], [
            'required' => ':attfribute harus diisi.',
            'email' => ':attribute harus berupa alamat email yang valid.',
            'date' => ':attribute harus dalam format tanggal yang benar.',
            'numeric' => ':attribute harus berupa angka.',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        Institusi::where('id',$institusi->id)->update([
            'nama_investor' =>  $request->nama_investor,
            'nomor_register'    =>  $request->nomor_register,
            'nomor_cif'    =>  $request->nomor_register,
            'agen_pemasaran_id' =>  $request->agen_pemasaran_id,
            'pejabat_berwenang_id_1' =>  $request->pejabat_berwenang_id1,
            'pejabat_berwenang_id_2' =>  $request->pejabat_berwenang_id2,
            'nama_institusi'    =>  $request->nama_institusi,
            'kota_institusi'    =>  $request->kota_institusi,
            'provinsi_institusi'    =>  $request->provinsi_institusi,
            'negara_institusi'  =>  $request->negara_institusi,
            'kode_pos_institusi'    =>  $request->kode_pos_institusi,
            'email_kantor'  =>  $request->email_kantor,
            'telephone_kantor'  =>  $request->telephone_kantor,
            'domisili'  =>  $request->domisili,
            'karakteristik' =>  $request->karakteristik,
            'tipe_perusahaan'   =>  $request->tipe_perusahaan,
            'bidang_usaha'  =>  $request->bidang_usaha,
            'nomor_akta_pendirian'  =>  $request->nomor_akta_pendirian,
            'tgl_akta_pendirian'    =>  $request->tgl_akta_pendirian,
            'tgl_akta_perubahan_terakhir'   =>  $request->tgl_akta_perubahan_terakhir,
            'nomor_akta_perubahan_terakhir' =>  $request->nomor_akta_perubahan_terakhir,
            'nomor_npwp'    =>  $request->nomor_npwp,
            'tgl_registrasi_npwp'   =>  $request->tgl_registrasi_npwp,
            'nomor_siup'    =>  $request->nomor_siup,
            'tgl_kadaluarsa_siup'   =>  $request->tgl_kadaluarsa_siup,
            'nomor_skdp'    =>  $request->nomor_skdp,
            'tgl_kadaluarsa_skdp'   =>  $request->tgl_kadaluarsa_skdp,
            'nomor_tdp' =>  $request->nomor_tdp,
            'tgl_kadaluarsa_tdp'    =>  $request->tgl_kadaluarsa_tdp,
            'nomor_izin_pma'    =>  $request->nomor_izin_pma,
        ]);

        $pemegangSaham = PemegangSahamInstitusi::where('institusi_id',$institusi->id)->update([
            'nama_pemegang_saham' =>  $request->nama_pemegang_saham,
            'komposisi_pemegang_saham'    =>  $request->komposisi_pemegang_saham,
            'tanggal_pernyataan'  =>  $request->tanggal_pernyataan,
            'yang_menyatakan' =>  $request->yang_menyatakan,
        ]);

        $penerimaKuasa = PenerimaKuasaTransaksiInstitusi::where('institusi_id',$institusi->id)->update([
            'nama_kuasa'    =>  $request->nama_kuasa,
            'nomor_identitas' =>  $request->nomor_identitas_kuasa,
            'tgl_kadaluarsa_identitas'    =>  $request->tgl_kadaluarsa_identitas_kuasa,
            'jabatan' =>  $request->jabatan_kuasa,
            'telephone'   =>  $request->telephone_kuasa,
        ]);

        $keuangan = DataKeuanganInstitusi::where('institusi_id',$institusi->id)->update([
            'aset_keuangan_tahun_1' =>  $request->aset_keuangan_tahun_1,
            'aset_keuangan_tahun_2' =>  $request->aset_keuangan_tahun_2,
            'aset_keuangan_tahun_3' =>  $request->aset_keuangan_tahun_3,
            'laba_keuangan_tahun_1' =>  $request->laba_keuangan_tahun_1,
            'laba_keuangan_tahun_2' =>  $request->laba_keuangan_tahun_2,
            'laba_keuangan_tahun_3' =>  $request->laba_keuangan_tahun_3,
            'sumber_dana'   =>  $request->sumber_dana,
            'tujuan_investasi'  =>  $request->tujuan_investasi,
        ]);
        
        $instruksiPembayaran = InstruksiPembayaranInstitusi::where('institusi_id',$institusi->id)->update([
            'nama_pemilik_bank' =>  $request->nama_pemilik_bank,
            'nama_bank' =>  $request->nama_bank,
            'nomor_rekening'    =>  $request->nomor_rekening,
        ]);

        $dokumenPendukung = DokumenPendukungInstitusi::where('institusi_id',$institusi->id)->update([
            'kelengkapan_dokumen'   =>  $request->kelengkapan_dokumen,
            'profil_resiko' =>  $request->profil_resiko,
            'bukti_setoran' =>  $request->bukti_setoran,
            'ttd_penerima_kuasa'    =>  $request->ttd_penerima_kuasa,
            'fatca' =>  $request->fatca,
            'persetujuan'   =>  $request->persetujuan,
        ]);

        return response()->json([
            'text'  =>  'Yeay, data rekening institusi berhasil diupdate',
            'url'   =>  url('/institusi/'),
        ]);
    }

    public function delete(Institusi $institusi){
        $delete = $institusi->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, data institusi berhasil dihapus',
                'url'   =>  url('/institusi/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data institusi gagal dihapus']);
        }
    }
}
