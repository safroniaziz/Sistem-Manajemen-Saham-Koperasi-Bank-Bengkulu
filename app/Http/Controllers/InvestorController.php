<?php

namespace App\Http\Controllers;

use App\Models\AgenPemasaran;
use App\Models\DokumenPendukungInvestor;
use App\Models\IdentitasInvestor;
use App\Models\Investor;
use App\Models\Korespondensi;
use App\Models\PasanganOrangTuaInvestor;
use App\Models\PejabatBerwenang;
use App\Models\PekerjaanInvestor;
use App\Models\PersetujuanInvestor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use PDF;

class InvestorController extends Controller
{
    public function index(Request $request){
        $nama = $request->query('nama');
        if (!empty($nama)) {
            $investors = Investor::where('nama_investor','LIKE','%'.$nama.'%')
                                    ->orderBy('created_at','desc')->paginate(10);
        }else {
            $investors = Investor::orderBy('created_at','desc')->paginate(10);
        }
        return view('investor.index',[
            'investors' =>  $investors,
            'nama' =>  $nama,
        ]);
    }

    public function create(){
        $pejabatBerwenangs = PejabatBerwenang::all();
        $agenPemasarans = AgenPemasaran::all();
        return view('investor.create',[
            'pejabatBerwenangs' =>  $pejabatBerwenangs,
            'agenPemasarans' =>  $agenPemasarans,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_investor' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'status_perkawinan' => 'required',
            'kewarganegaraan' => 'required',
            'jenis_rekening' => 'required',
            'profil_resiko_nasabah' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_ktp' => 'required',
            'tanggal_kadaluarsa_ktp' => 'required|date',
            'tanggal_registrasi_npwp' => 'required|date',
            'ktp' => 'required',
            'npwp' => 'required',
            'form_profil_resiko_pemodal' => 'required',
            'bukti_setoran_investasi_awal' => 'required',
            'contoh_tanda_tangan' => 'required',
            'fatca' => 'nullable',
            'alamat_ktp' => 'required',
            'rt_ktp' => 'required',
            'rw_ktp' => 'required',
            'kelurahan_ktp' => 'required',
            'kecamatan_ktp' => 'required',
            'kota_ktp' => 'required',
            'provinsi_ktp' => 'required',
            'kode_pos_ktp' => 'required',
            'alamat_tempat_tinggal' => 'required',
            'rt_tempat_tinggal' => 'required',
            'rw_tempat_tinggal' => 'required',
            'kelurahan_tempat_tinggal' => 'required',
            'kecamatan_tempat_tinggal' => 'required',
            'kota_tempat_tinggal' => 'required',
            'provinsi_tempat_tinggal' => 'required',
            'kode_pos_tempat_tinggal' => 'required',
            'telpon_rumah' => 'required',
            'ponsel' => 'required',
            'lama_menempati' => 'required',
            'status_rumah_tinggal' => 'required',
            'agama' => 'required',
            'pendidikan_terakhir' => 'required',
            'nama_gadis_ibu_kandung' => 'required',
            'emergency_kontak' => 'required',
            'nama_pasangan' => 'required',
            'hubungan' => 'required',
            'alamat_pasangan' => 'required',
            'telpon_rumah_pasangan' => 'required',
            'ponsel_pasangan' => 'required',
            'pekerjaan_pasangan' => 'required',
            'sumber_penghasilan_utama_pasangan' => 'required',
            'nama_pekerjaan' => 'required',
            'sumber_penghasilan_utama' => 'required',
            'sumber_dana_investasi' => 'required',
            'agen_pemasaran_id' => 'required',
            'tanda_tangan_agen_pemasaran' => 'required',
            'tanggal_agen_pemasaran' => 'required|date',
            'pejabat_berwenang_id' => 'required',
            'status_persetujuan' => 'required',
            'tanggal_pejabat_berwenang' => 'required|date',
            'tanda_tangan_pejabat_berwenang' => 'required',
            'nama_ahli_waris' => 'required',
            'hubungan_ahli_waris' => 'required',
        ], [
            'nama_investor.required' => 'Nama investor harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date' => 'Tanggal lahir harus dalam format tanggal yang benar',
            'status_perkawinan.required' => 'Status perkawinan harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi',
            'jenis_rekening.required' => 'Jenis rekening harus diisi',
            'profil_resiko_nasabah.required' => 'Profil resiko nasabah harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'nomor_ktp.required' => 'Nomor KTP harus diisi',
            'tanggal_kadaluarsa_ktp.required' => 'Tanggal kadaluarsa KTP harus diisi',
            'tanggal_kadaluarsa_ktp.date' => 'Tanggal kadaluarsa KTP harus dalam format tanggal yang benar',
            'tanggal_registrasi_npwp.required' => 'Tanggal registrasi NPWP harus diisi',
            'tanggal_registrasi_npwp.date' => 'Tanggal registrasi NPWP harus dalam format tanggal yang benar',
            'ktp.required' => 'KTP harus diisi',
            'npwp.required' => 'NPWP harus diisi',
            'form_profil_resiko_pemodal.required' => 'Formulir profil resiko pemodal harus diisi',
            'bukti_setoran_investasi_awal.required' => 'Bukti setoran investasi awal harus diisi',
            'contoh_tanda_tangan.required' => 'Contoh tanda tangan harus diisi',
            'alamat_ktp.required' => 'Alamat KTP harus diisi',
            'rt_ktp.required' => 'RT KTP harus diisi',
            'rw_ktp.required' => 'RW KTP harus diisi',
            'kelurahan_ktp.required' => 'Kelurahan KTP harus diisi',
            'kecamatan_ktp.required' => 'Kecamatan KTP harus diisi',
            'kota_ktp.required' => 'Kota KTP harus diisi',
            'provinsi_ktp.required' => 'Provinsi KTP harus diisi',
            'kode_pos_ktp.required' => 'Kode Pos KTP harus diisi',
            'alamat_tempat_tinggal.required' => 'Alamat tempat tinggal harus diisi',
            'rt_tempat_tinggal.required' => 'RT tempat tinggal harus diisi',
            'rw_tempat_tinggal.required' => 'RW tempat tinggal harus diisi',
            'kelurahan_tempat_tinggal.required' => 'Kelurahan tempat tinggal harus diisi',
            'kecamatan_tempat_tinggal.required' => 'Kecamatan tempat tinggal harus diisi',
            'kota_tempat_tinggal.required' => 'Kota tempat tinggal harus diisi',
            'provinsi_tempat_tinggal.required' => 'Provinsi tempat tinggal harus diisi',
            'kode_pos_tempat_tinggal.required' => 'Kode Pos tempat tinggal harus diisi',
            'telpon_rumah.required' => 'Telpon rumah harus diisi',
            'ponsel.required' => 'Ponsel harus diisi',
            'lama_menempati.required' => 'Lama menetap harus diisi',
            'status_rumah_tinggal.required' => 'Status rumah tinggal harus diisi',
            'agama.required' => 'Agama harus diisi',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir harus diisi',
            'nama_gadis_ibu_kandung.required' => 'Nama gadis ibu kandung harus diisi',
            'emergency_kontak.required' => 'Emergency kontak harus diisi',
            'nama_pasangan.required' => 'Nama pasangan harus diisi',
            'hubungan.required' => 'Hubungan harus diisi',
            'alamat_pasangan.required' => 'Alamat pasangan harus diisi',
            'telpon_rumah_pasangan.required' => 'Telpon rumah pasangan harus diisi',
            'ponsel_pasangan.required' => 'Ponsel pasangan harus diisi',
            'sumber_penghasilan_utama_pasangan.required' => 'Sumber penghasilan utama pasangan harus diisi',
            'nama_pekerjaan.required' => 'Nama pekerjaan harus diisi',
            'sumber_penghasilan_utama.required' => 'Sumber penghasilan utama harus diisi',
            'sumber_dana_investasi.required' => 'Sumber dana investasi harus diisi',
            'agen_pemasaran_id.required' => 'Agen pemasaran harus diisi',
            'tanda_tangan_agen_pemasaran.required' => 'Tanda tangan agen pemasaran harus diisi',
            'tanggal_agen_pemasaran.required' => 'Tanggal agen pemasaran harus diisi',
            'tanggal_agen_pemasaran.date' => 'Tanggal agen pemasaran harus dalam format tanggal yang benar',
            'pejabat_berwenang_id.required' => 'Pejabat berwenang harus diisi',
            'status_persetujuan.required' => 'Status persetujuan harus diisi',
            'tanggal_pejabat_berwenang.required' => 'Tanggal pejabat berwenang harus diisi',
            'tanggal_pejabat_berwenang.date' => 'Tanggal pejabat berwenang harus dalam format tanggal yang benar',
            'tanda_tangan_pejabat_berwenang.required' => 'Tanda tangan pejabat berwenang harus diisi',
            'nama_ahli_waris.required' => 'Nama ahli waris harus diisi',
            'hubungan_ahli_waris.required' => 'Hubungan ahli waris harus diisi',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $investor = Investor::create([
            'nomor_register'  =>  $request->nomor_register,
            'nama_investor'   =>  $request->nama_investor,
            'tempat_lahir'    =>  $request->tempat_lahir,
            'tanggal_lahir'   =>  $request->tanggal_lahir,
            'status_perkawinan'   =>  $request->status_perkawinan,
            'kewarganegaraan' =>  $request->kewarganegaraan,
            'jenis_rekening'  =>  $request->jenis_rekening,
            'profil_resiko_nasabah'   =>  $request->profil_resiko_nasabah,
            'jenis_kelamin'   =>  $request->jenis_kelamin,
            'nomor_ktp'   =>  $request->nomor_ktp,
            'tanggal_kadaluarsa_ktp'  =>  $request->tanggal_kadaluarsa_ktp,
            'nomor_npwp'  =>  $request->nomor_npwp,
            'tanggal_registrasi_npwp' =>  $request->tanggal_registrasi_npwp,
            'nama_ahli_waris' =>  $request->nama_ahli_waris,
            'hubungan_ahli_waris' =>  $request->hubungan_ahli_waris,
            'is_verified'   =>  1,
        ]);

        $indentitas = IdentitasInvestor::create([
            'investor_id'   =>  $investor->id,
            'alamat_ktp'    =>  $request->alamat_ktp,
            'rt_ktp'    =>  $request->rt_ktp,
            'rw_ktp'    =>  $request->rw_ktp,
            'kelurahan_ktp' =>  $request->kelurahan_ktp,
            'kecamatan_ktp' =>  $request->kecamatan_ktp,
            'kota_ktp'  =>  $request->kota_ktp,
            'provinsi_ktp'  =>  $request->provinsi_ktp,
            'kode_pos_ktp'  =>  $request->kode_pos_ktp,
            'alamat_tempat_tinggal' =>  $request->alamat_tempat_tinggal,
            'rt_tempat_tinggal' =>  $request->rt_tempat_tinggal,
            'rw_tempat_tinggal' =>  $request->rw_tempat_tinggal,
            'kelurahan_tempat_tinggal'  =>  $request->kelurahan_tempat_tinggal,
            'kecamatan_tempat_tinggal'  =>  $request->kecamatan_tempat_tinggal,
            'kota_tempat_tinggal'   =>  $request->kota_tempat_tinggal,
            'provinsi_tempat_tinggal'   =>  $request->provinsi_tempat_tinggal,
            'kode_pos_tempat_tinggal'   =>  $request->kode_pos_tempat_tinggal,
            'telpon_rumah'  =>  $request->telpon_rumah,
            'ponsel'    =>  $request->ponsel,
            'lama_menempati'    =>  $request->lama_menempati,
            'status_rumah_tinggal'  =>  $request->status_rumah_tinggal,
            'agama' =>  $request->agama,
            'pendidikan_terakhir'   =>  $request->pendidikan_terakhir,
            'nama_gadis_ibu_kandung'    =>  $request->nama_gadis_ibu_kandung,
            'emergency_kontak'  =>  $request->emergency_kontak,
        ]);

        $persetujuan = PersetujuanInvestor::create([
            'investor_id'   =>  $investor->id,
            'agen_pemasaran_id' =>  $request->agen_pemasaran_id,
            'pejabat_berwenang_id'  =>  $request->pejabat_berwenang_id,
            'ttd_agen_pemasaran'    =>  $request->tanda_tangan_agen_pemasaran,
            'tanggal_agen_pemasaran'    =>  $request->tanggal_agen_pemasaran,
            'status_persetujuan'    =>  $request->status_persetujuan,
            'ttd_pejabat_berwenang' =>  $request->tanda_tangan_pejabat_berwenang,
            'tanggal_pejabat_berwenang' =>  $request->tanggal_pejabat_berwenang,
        ]);

        $dokumen = DokumenPendukungInvestor::create([
            'investor_id'   =>  $investor->id,
            'ktp'   =>  $request->ktp,
            'npwp'  =>  $request->npwp,
            'form_profil_resiko_pemodal'    =>  $request->form_profil_resiko_pemodal,
            'bukti_setoran_investasi_awal'  =>  $request->bukti_setoran_investasi_awal,
            'contoh_tanda_tangan'   =>  $request->contoh_tanda_tangan,
            'formulir_fatca'    =>  $request->fatca,
        ]);
        
        $pasangan = PasanganOrangTuaInvestor::create([
            'investor_id'   =>  $investor->id,
            'nama_pasangan' =>  $request->nama_pasangan,
            'hubungan'  =>  $request->hubungan,
            'alamat_pasangan'   =>  $request->alamat_pasangan,
            'telepon_rumah_pasangan'    =>  $request->telpon_rumah_pasangan,
            'ponsel_pasangan'   =>  $request->ponsel_pasangan,
            'pekerjaan_pasangan'    =>  $request->pekerjaan_pasangan,
            'perusahaan_pasangan'   =>  $request->perusahaan_pasangan,
            'jabatan_pasangan'  =>  $request->jabatan_pasangan,
            'alamat_perusahan_pasangan' =>  $request->alamat_perusahan_pasangan,
            'kota_perusahan_pasangan'   =>  $request->kota_perusahan_pasangan,
            'provinsi_perusahaan_pasangan'  =>  $request->provinsi_perusahaan_pasangan,
            'kode_pos_perusahaan_pasangan'  =>  $request->kode_pos_perusahaan_pasangan,
            'telpon_perusahaan_pasangan'    =>  $request->telpon_perusahaan_pasangan,
            'email_perusahaan_pasangan' =>  $request->email_perusahaan_pasangan,
            'fax_perusahaan_pasangan'   =>  $request->fax_perusahaan_pasangan,
            'jenis_usaha_pasangan'  =>  $request->jenis_usaha_pasangan,
            'lama_bekerja_pasangan' =>  $request->lama_bekerja_pasangan,
            'penghasilan_kotor_per_tahun_pasangan'   =>  $request->penghasilan_kotor_per_tahun_pasangan,
            'sumber_penghasilan_utama_pasangan' =>  $request->sumber_penghasilan_utama_pasangan,
        ]);

        $pekerjaan = PekerjaanInvestor::create([
            'investor_id'   =>  $investor->id,
            'nama_pekerjaan'    =>  $request->nama_pekerjaan,
            'nama_perusahaan'   =>  $request->nama_perusahaan,
            'jabatan'   =>  $request->jabatan,
            'alamat_perusahaan' =>  $request->alamat_perusahaan,
            'kota_perusahaan'   =>  $request->kota_perusahaan,
            'provinsi_perusahaan'   =>  $request->provinsi_perusahaan,
            'kode_pos_perusahaan'   =>  $request->kode_pos_perusahaan,
            'telpon_perusahaan' =>  $request->telpon_perusahaan,
            'email_perusahaan'  =>  $request->email_perusahaan,
            'fax_perusahaan'    =>  $request->fax_perusahaan,
            'jenis_usaha'   =>  $request->jenis_usaha,
            'lama_bekerja'  =>  $request->lama_bekerja,
            'sumber_penghasilan_utama'  =>  $request->sumber_penghasilan_utama,
            'penghasilan_lainnya'   =>  $request->penghasilan_lainnya,
            'sumber_penghasilan_lainnya'    =>  $request->sumber_penghasilan_lainnya,
            'sumber_dana_investasi' =>  $request->sumber_dana_investasi,
        ]);

        $korespondensi = Korespondensi::create([
            'investor_id'   =>  $investor->id,
            'alamat_surat_menyurat_ktp' =>  $request->alamat_surat_menyurat_ktp,
            'alamat_surat_menyurat_tempat_tinggal'  =>  $request->alamat_surat_menyurat_tempat_tinggal,
            'alamat_surat_menyurat_lainnya' =>  $request->alamat_surat_menyurat_lainnya,
            'pengiriman_konfirmasi_melalui_email'   =>  $request->pengiriman_konfirmasi_melalui_email,
            'pengiriman_konfirmasi_melalui_fax' =>  $request->pengiriman_konfirmasi_melalui_fax,
            'pengiriman_konfirmasi_melalui_alamat_surat_menyurat'   =>  $request->pengiriman_konfirmasi_melalui_alamat_surat_menyurat,
            'tujuan_investasi'  =>  $request->tujuan_investasi,
        ]);

   
        return response()->json([
            'text'  =>  'Yeay, data rekening investor berhasil disimpan',
            'url'   =>  url('/investor/'),
        ]);
    }

    public function edit(Investor $investor){
        $dataInvestor = Investor::with(['persetujuanInvestor','dokumenPendukungInvestor','pasanganOrangTuaInvestor','identitasInvestor','pekerjaanInvestor','korespondensi'])->where('id',$investor->id)->first();
        $pejabatBerwenangs = PejabatBerwenang::all();
        $agenPemasarans = AgenPemasaran::all();
        return view('investor.edit',[
            'dataInvestor'  =>  $dataInvestor,
            'pejabatBerwenangs'  =>  $pejabatBerwenangs,
            'agenPemasarans'  =>  $agenPemasarans,
        ]);
    }

    public function update(Request $request, Investor $investor){
        $validator = Validator::make($request->all(), [
            'nama_investor' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'status_perkawinan' => 'required',
            'kewarganegaraan' => 'required',
            'jenis_rekening' => 'required',
            'profil_resiko_nasabah' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_ktp' => 'required',
            'tanggal_kadaluarsa_ktp' => 'required|date',
            'tanggal_registrasi_npwp' => 'required|date',
            'ktp' => 'required',
            'npwp' => 'required',
            'form_profil_resiko_pemodal' => 'required',
            'bukti_setoran_investasi_awal' => 'required',
            'contoh_tanda_tangan' => 'required',
            'fatca' => 'nullable',
            'alamat_ktp' => 'required',
            'rt_ktp' => 'required',
            'rw_ktp' => 'required',
            'kelurahan_ktp' => 'required',
            'kecamatan_ktp' => 'required',
            'kota_ktp' => 'required',
            'provinsi_ktp' => 'required',
            'kode_pos_ktp' => 'required',
            'alamat_tempat_tinggal' => 'required',
            'rt_tempat_tinggal' => 'required',
            'rw_tempat_tinggal' => 'required',
            'kelurahan_tempat_tinggal' => 'required',
            'kecamatan_tempat_tinggal' => 'required',
            'kota_tempat_tinggal' => 'required',
            'provinsi_tempat_tinggal' => 'required',
            'kode_pos_tempat_tinggal' => 'required',
            'telpon_rumah' => 'required',
            'ponsel' => 'required',
            'lama_menempati' => 'required',
            'status_rumah_tinggal' => 'required',
            'agama' => 'required',
            'pendidikan_terakhir' => 'required',
            'nama_gadis_ibu_kandung' => 'required',
            'emergency_kontak' => 'required',
            'nama_pasangan' => 'required',
            'hubungan' => 'required',
            'alamat_pasangan' => 'required',
            'telpon_rumah_pasangan' => 'required',
            'ponsel_pasangan' => 'required',
            'pekerjaan_pasangan' => 'required',
            'sumber_penghasilan_utama_pasangan' => 'required',
            'nama_pekerjaan' => 'required',
            'sumber_penghasilan_utama' => 'required',
            'sumber_dana_investasi' => 'required',
            'agen_pemasaran_id' => 'required',
            'tanda_tangan_agen_pemasaran' => 'required',
            'tanggal_agen_pemasaran' => 'required|date',
            'pejabat_berwenang_id' => 'required',
            'status_persetujuan' => 'required',
            'tanggal_pejabat_berwenang' => 'required|date',
            'tanda_tangan_pejabat_berwenang' => 'required',
            'nama_ahli_waris' => 'required',
            'hubungan_ahli_waris' => 'required',
        ], [
            'nama_investor.required' => 'Nama investor harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date' => 'Tanggal lahir harus dalam format tanggal yang benar',
            'status_perkawinan.required' => 'Status perkawinan harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi',
            'jenis_rekening.required' => 'Jenis rekening harus diisi',
            'profil_resiko_nasabah.required' => 'Profil resiko nasabah harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'nomor_ktp.required' => 'Nomor KTP harus diisi',
            'tanggal_kadaluarsa_ktp.required' => 'Tanggal kadaluarsa KTP harus diisi',
            'tanggal_kadaluarsa_ktp.date' => 'Tanggal kadaluarsa KTP harus dalam format tanggal yang benar',
            'tanggal_registrasi_npwp.required' => 'Tanggal registrasi NPWP harus diisi',
            'tanggal_registrasi_npwp.date' => 'Tanggal registrasi NPWP harus dalam format tanggal yang benar',
            'ktp.required' => 'KTP harus diisi',
            'npwp.required' => 'NPWP harus diisi',
            'form_profil_resiko_pemodal.required' => 'Formulir profil resiko pemodal harus diisi',
            'bukti_setoran_investasi_awal.required' => 'Bukti setoran investasi awal harus diisi',
            'contoh_tanda_tangan.required' => 'Contoh tanda tangan harus diisi',
            'alamat_ktp.required' => 'Alamat KTP harus diisi',
            'rt_ktp.required' => 'RT KTP harus diisi',
            'rw_ktp.required' => 'RW KTP harus diisi',
            'kelurahan_ktp.required' => 'Kelurahan KTP harus diisi',
            'kecamatan_ktp.required' => 'Kecamatan KTP harus diisi',
            'kota_ktp.required' => 'Kota KTP harus diisi',
            'provinsi_ktp.required' => 'Provinsi KTP harus diisi',
            'kode_pos_ktp.required' => 'Kode Pos KTP harus diisi',
            'alamat_tempat_tinggal.required' => 'Alamat tempat tinggal harus diisi',
            'rt_tempat_tinggal.required' => 'RT tempat tinggal harus diisi',
            'rw_tempat_tinggal.required' => 'RW tempat tinggal harus diisi',
            'kelurahan_tempat_tinggal.required' => 'Kelurahan tempat tinggal harus diisi',
            'kecamatan_tempat_tinggal.required' => 'Kecamatan tempat tinggal harus diisi',
            'kota_tempat_tinggal.required' => 'Kota tempat tinggal harus diisi',
            'provinsi_tempat_tinggal.required' => 'Provinsi tempat tinggal harus diisi',
            'kode_pos_tempat_tinggal.required' => 'Kode Pos tempat tinggal harus diisi',
            'telpon_rumah.required' => 'Telpon rumah harus diisi',
            'ponsel.required' => 'Ponsel harus diisi',
            'lama_menempati.required' => 'Lama menetap harus diisi',
            'status_rumah_tinggal.required' => 'Status rumah tinggal harus diisi',
            'agama.required' => 'Agama harus diisi',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir harus diisi',
            'nama_gadis_ibu_kandung.required' => 'Nama gadis ibu kandung harus diisi',
            'emergency_kontak.required' => 'Emergency kontak harus diisi',
            'nama_pasangan.required' => 'Nama pasangan harus diisi',
            'hubungan.required' => 'Hubungan harus diisi',
            'alamat_pasangan.required' => 'Alamat pasangan harus diisi',
            'telpon_rumah_pasangan.required' => 'Telpon rumah pasangan harus diisi',
            'ponsel_pasangan.required' => 'Ponsel pasangan harus diisi',
            'sumber_penghasilan_utama_pasangan.required' => 'Sumber penghasilan utama pasangan harus diisi',
            'nama_pekerjaan.required' => 'Nama pekerjaan harus diisi',
            'sumber_penghasilan_utama.required' => 'Sumber penghasilan utama harus diisi',
            'sumber_dana_investasi.required' => 'Sumber dana investasi harus diisi',
            'agen_pemasaran_id.required' => 'Agen pemasaran harus diisi',
            'tanda_tangan_agen_pemasaran.required' => 'Tanda tangan agen pemasaran harus diisi',
            'tanggal_agen_pemasaran.required' => 'Tanggal agen pemasaran harus diisi',
            'tanggal_agen_pemasaran.date' => 'Tanggal agen pemasaran harus dalam format tanggal yang benar',
            'pejabat_berwenang_id.required' => 'Pejabat berwenang harus diisi',
            'status_persetujuan.required' => 'Status persetujuan harus diisi',
            'tanggal_pejabat_berwenang.required' => 'Tanggal pejabat berwenang harus diisi',
            'tanggal_pejabat_berwenang.date' => 'Tanggal pejabat berwenang harus dalam format tanggal yang benar',
            'tanda_tangan_pejabat_berwenang.required' => 'Tanda tangan pejabat berwenang harus diisi',
            'nama_ahli_waris.required' => 'Nama ahli waris harus diisi',
            'hubungan_ahli_waris.required' => 'Hubungan ahli waris harus diisi',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => 0, 'text' => $validator->errors()->first()], 422);
        }

        $investor->update([
            'nomor_register'  =>  $request->nomor_register,
            'nama_investor'   =>  $request->nama_investor,
            'tempat_lahir'    =>  $request->tempat_lahir,
            'tanggal_lahir'   =>  $request->tanggal_lahir,
            'status_perkawinan'   =>  $request->status_perkawinan,
            'kewarganegaraan' =>  $request->kewarganegaraan,
            'jenis_rekening'  =>  $request->jenis_rekening,
            'profil_resiko_nasabah'   =>  $request->profil_resiko_nasabah,
            'jenis_kelamin'   =>  $request->jenis_kelamin,
            'nomor_ktp'   =>  $request->nomor_ktp,
            'tanggal_kadaluarsa_ktp'  =>  $request->tanggal_kadaluarsa_ktp,
            'nomor_npwp'  =>  $request->nomor_npwp,
            'tanggal_registrasi_npwp' =>  $request->tanggal_registrasi_npwp,
            'nama_ahli_waris' =>  $request->nama_ahli_waris,
            'hubungan_ahli_waris' =>  $request->hubungan_ahli_waris,
            'is_verified'   =>  1,
        ]);
        
        IdentitasInvestor::where('id',$investor->id)->update([
            'investor_id'   =>  $investor->id,
            'alamat_ktp'    =>  $request->alamat_ktp,
            'rt_ktp'    =>  $request->rt_ktp,
            'rw_ktp'    =>  $request->rw_ktp,
            'kelurahan_ktp' =>  $request->kelurahan_ktp,
            'kecamatan_ktp' =>  $request->kecamatan_ktp,
            'kota_ktp'  =>  $request->kota_ktp,
            'provinsi_ktp'  =>  $request->provinsi_ktp,
            'kode_pos_ktp'  =>  $request->kode_pos_ktp,
            'alamat_tempat_tinggal' =>  $request->alamat_tempat_tinggal,
            'rt_tempat_tinggal' =>  $request->rt_tempat_tinggal,
            'rw_tempat_tinggal' =>  $request->rw_tempat_tinggal,
            'kelurahan_tempat_tinggal'  =>  $request->kelurahan_tempat_tinggal,
            'kecamatan_tempat_tinggal'  =>  $request->kecamatan_tempat_tinggal,
            'kota_tempat_tinggal'   =>  $request->kota_tempat_tinggal,
            'provinsi_tempat_tinggal'   =>  $request->provinsi_tempat_tinggal,
            'kode_pos_tempat_tinggal'   =>  $request->kode_pos_tempat_tinggal,
            'telpon_rumah'  =>  $request->telpon_rumah,
            'ponsel'    =>  $request->ponsel,
            'lama_menempati'    =>  $request->lama_menempati,
            'status_rumah_tinggal'  =>  $request->status_rumah_tinggal,
            'agama' =>  $request->agama,
            'pendidikan_terakhir'   =>  $request->pendidikan_terakhir,
            'nama_gadis_ibu_kandung'    =>  $request->nama_gadis_ibu_kandung,
            'emergency_kontak'  =>  $request->emergency_kontak,
        ]);

        PersetujuanInvestor::where('id',$investor->id)->update([
            'investor_id'   =>  $investor->id,
            'agen_pemasaran_id' =>  $request->agen_pemasaran_id,
            'pejabat_berwenang_id'  =>  $request->pejabat_berwenang_id,
            'ttd_agen_pemasaran'    =>  $request->tanda_tangan_agen_pemasaran,
            'tanggal_agen_pemasaran'    =>  $request->tanggal_agen_pemasaran,
            'status_persetujuan'    =>  $request->status_persetujuan,
            'ttd_pejabat_berwenang' =>  $request->tanda_tangan_pejabat_berwenang,
            'tanggal_pejabat_berwenang' =>  $request->tanggal_pejabat_berwenang,
        ]);

        DokumenPendukungInvestor::where('id',$investor->id)->update([
            'investor_id'   =>  $investor->id,
            'ktp'   =>  $request->ktp,
            'npwp'  =>  $request->npwp,
            'form_profil_resiko_pemodal'    =>  $request->form_profil_resiko_pemodal,
            'bukti_setoran_investasi_awal'  =>  $request->bukti_setoran_investasi_awal,
            'contoh_tanda_tangan'   =>  $request->contoh_tanda_tangan,
            'formulir_fatca'    =>  $request->fatca,
        ]);
        
        PasanganOrangTuaInvestor::where('id',$investor->id)->update([
            'investor_id'   =>  $investor->id,
            'nama_pasangan' =>  $request->nama_pasangan,
            'hubungan'  =>  $request->hubungan,
            'alamat_pasangan'   =>  $request->alamat_pasangan,
            'telepon_rumah_pasangan'    =>  $request->telpon_rumah_pasangan,
            'ponsel_pasangan'   =>  $request->ponsel_pasangan,
            'pekerjaan_pasangan'    =>  $request->pekerjaan_pasangan,
            'perusahaan_pasangan'   =>  $request->perusahaan_pasangan,
            'jabatan_pasangan'  =>  $request->jabatan_pasangan,
            'alamat_perusahan_pasangan' =>  $request->alamat_perusahan_pasangan,
            'kota_perusahan_pasangan'   =>  $request->kota_perusahan_pasangan,
            'provinsi_perusahaan_pasangan'  =>  $request->provinsi_perusahaan_pasangan,
            'kode_pos_perusahaan_pasangan'  =>  $request->kode_pos_perusahaan_pasangan,
            'telpon_perusahaan_pasangan'    =>  $request->telpon_perusahaan_pasangan,
            'email_perusahaan_pasangan' =>  $request->email_perusahaan_pasangan,
            'fax_perusahaan_pasangan'   =>  $request->fax_perusahaan_pasangan,
            'jenis_usaha_pasangan'  =>  $request->jenis_usaha_pasangan,
            'lama_bekerja_pasangan' =>  $request->lama_bekerja_pasangan,
            'penghasilan_kotor_per_tahun_pasangan'   =>  $request->penghasilan_kotor_per_tahun_pasangan,
            'sumber_penghasilan_utama_pasangan' =>  $request->sumber_penghasilan_utama_pasangan,
        ]);

        PekerjaanInvestor::where('id',$investor->id)->update([
            'investor_id'   =>  $investor->id,
            'nama_pekerjaan'    =>  $request->nama_pekerjaan,
            'nama_perusahaan'   =>  $request->nama_perusahaan,
            'jabatan'   =>  $request->jabatan,
            'alamat_perusahaan' =>  $request->alamat_perusahaan,
            'kota_perusahaan'   =>  $request->kota_perusahaan,
            'provinsi_perusahaan'   =>  $request->provinsi_perusahaan,
            'kode_pos_perusahaan'   =>  $request->kode_pos_perusahaan,
            'telpon_perusahaan' =>  $request->telpon_perusahaan,
            'email_perusahaan'  =>  $request->email_perusahaan,
            'fax_perusahaan'    =>  $request->fax_perusahaan,
            'jenis_usaha'   =>  $request->jenis_usaha,
            'lama_bekerja'  =>  $request->lama_bekerja,
            'sumber_penghasilan_utama'  =>  $request->sumber_penghasilan_utama,
            'penghasilan_lainnya'   =>  $request->penghasilan_lainnya,
            'sumber_penghasilan_lainnya'    =>  $request->sumber_penghasilan_lainnya,
            'sumber_dana_investasi' =>  $request->sumber_dana_investasi,
        ]);

        Korespondensi::where('id',$investor->id)->update([
            'investor_id'   =>  $investor->id,
            'alamat_surat_menyurat_ktp' =>  $request->alamat_surat_menyurat_ktp,
            'alamat_surat_menyurat_tempat_tinggal'  =>  $request->alamat_surat_menyurat_tempat_tinggal,
            'alamat_surat_menyurat_lainnya' =>  $request->alamat_surat_menyurat_lainnya,
            'pengiriman_konfirmasi_melalui_email'   =>  $request->pengiriman_konfirmasi_melalui_email,
            'pengiriman_konfirmasi_melalui_fax' =>  $request->pengiriman_konfirmasi_melalui_fax,
            'pengiriman_konfirmasi_melalui_alamat_surat_menyurat'   =>  $request->pengiriman_konfirmasi_melalui_alamat_surat_menyurat,
            'tujuan_investasi'  =>  $request->tujuan_investasi,
        ]);

   
        return response()->json([
            'text'  =>  'Yeay, data rekening investor berhasil disimpan',
            'url'   =>  url('/investor/'),
        ]);
    }

    public function delete(Investor $investor){
        $delete = $investor->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Yeay, data investor berhasil dihapus',
                'url'   =>  url('/investor/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, data investor gagal dihapus']);
        }
    }
}
