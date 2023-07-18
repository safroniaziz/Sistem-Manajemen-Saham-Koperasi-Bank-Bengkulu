@extends('layouts.app')
@section('subTitle','Data Investor')
@section('page','Data Investor')
@section('subPage','Semua Data')
@section('user-login')
    {{-- {{ Auth::user()->nama_lengkap }} --}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-calendar"></i>&nbsp;Tambah Data Investor</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form action="">
                            <div class="form-group col-md-6">
                                <label for="">Pilih Nama Investor</label>
                                <input type="text" name="nama_investor" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Status Perkawinan</label>
                                <select name="status_perkawinan" class="form-control" id="">
                                    <option disabled selected>-- pilih status perkawinan --</option>
                                    <option value="menikah">Menikah</option>
                                    <option value="belum_menikah">Belum Menikah</option>
                                    <option value="janda/duda">Janda/Duda</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kewarganegaraan</label>
                                <select name="kewarganegaraan" class="form-control" id="">
                                    <option disabled selected>-- pilih Kewarganegaraan --</option>
                                    <option value="wni">Warga Negara Indonesia</option>
                                    <option value="wna">Warga Negara Asing</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jenis Rekening</label>
                                <select name="jenis_rekening" class="form-control" id="">
                                    <option disabled selected>-- pilih Jenis Rekening --</option>
                                    <option value="perorangan">Perorangan</option>
                                    <option value="nonperorangan">Nonperorangan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Profil Resiko Nasaba</label>
                                <input type="text" name="profil_resiko_nasaba" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nomor KTP</label>
                                <input type="text" name="nomor_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Kadaluarsa KTP</label>
                                <input type="date" name="tanggal_kadaluarsa_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Registrasi Npwp</label>
                                <input type="date" name="tanggal_registrasi_npwp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat KTP</label>
                                <input type="text" name="alamat_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Rt KTP</label>
                                <input type="text" name="rt_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Rw KTP</label>
                                <input type="text" name="rw_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kelurahan KTP</label>
                                <input type="text" name="kelurahan_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kecamatan KTP</label>
                                <input type="text" name="kecamatan_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kota KTP</label>
                                <input type="text" name="kota_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Provinsi KTP</label>
                                <input type="text" name="provinsi_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kode Pos KTP</label>
                                <input type="text" name="kode_pos_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat Tempat Tinggal</label>
                                <input type="text" name="alamat_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Rt Tempat tinggal</label>
                                <input type="text" name="rt_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Rw Tempat Tinggal</label>
                                <input type="text" name="rw_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kelurahan Tempat Tinggal</label>
                                <input type="text" name="kelurahan_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kecamatan Tempat Tinggal</label>
                                <input type="text" name="kecamatan_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kota Tempat Tinggal</label>
                                <input type="text" name="kota_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Provinsi Tempat Tinggal</label>
                                <input type="text" name="provinsi_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kode Pos Tempat Tinggal</label>
                                <input type="text" name="kode_pos_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Telpon Rumah</label>
                                <input type="text" name="telpon_rumah" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Ponsel</label>
                                <input type="text" name="ponsel" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Lama Menetap</label>
                                <input type="text" name="lama_menetap" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Status Rumah Tinggal</label>
                                <select name="status_rumah_tinggal" class="form-control" id="">
                                    <option disabled selected>-- pilih Status Rumah Tinggal --</option>
                                    <option value="milik_sendiri">Milik Sendiri</option>
                                    <option value="sewa">Sewa</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Agama</label>
                                <select name="agama" class="form-control" id="">
                                    <option disabled selected>-- pilih Agama --</option>
                                    <option value="islam">Islam</option>
                                    <option value="protestan">Protestan</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="konghucu">Konghucu</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Pendidikan Terakhir</label>
                                <select name="pendidikan_terakhir" class="form-control" id="">
                                    <option disabled selected>-- pilih Pendidikan Terakhir --</option>
                                    <option value="sma">SMA</option>
                                    <option value="d3">D3</option>
                                    <option value="s1">S1</option>
                                    <option value="s2">S2</option>
                                    <option value="s3">S3</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Gadis Ibu Kandung</label>
                                <input type="text" name="nama_gadis_ibu_kandung" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Emergency Kontak</label>
                                <input type="text" name="emergency_kontak" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat Surat Menyurat KTP</label>
                                <input type="text" name="alamat_surat_menyurat_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat Surat Menyurat Tempat Tinggal</label>
                                <input type="text" name="alamat_surat_menyurat_tempat_tinggal" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat Surat Menyurat Lainnya</label>
                                <input type="text" name="alamat_surat_menyurat_lainnya" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Pengiriman Konfirmasi Melalui Email</label>
                                <input type="text" name="pengiriman_konfirmasi_melalui_email" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Pengiriman Konfirmasi Melalui Fax</label>
                                <input type="text" name="pengiriman_konfirmasi_melalui_fax" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Pengiriman Konfirmasi Melalui Alamat Surat Menyurat</label>
                                <input type="text" name="pengiriman_konfirmasi_melalui_alamat_surat_menyurat" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tujuan Investor</label>
                                <input type="text" name="tujuan_investor" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Pasangan</label>
                                <input type="text" name="nama_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Hubungan</label>
                                <input type="text" name="hubungan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat Pasangan</label>
                                <input type="text" name="alamat_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Telpon Rumah Pasangan</label>
                                <input type="text" name="telpon_rumah_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Ponsel Pasangan</label>
                                <input type="text" name="ponsel_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Pekerjaan Pasangan</label>
                                <input type="text" name="pekerjaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Perusaan Pasangan</label>
                                <input type="text" name="perusaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jabatan Pasangan</label>
                                <select name="jabatan_pasangan" class="form-control" id="">
                                    <option disabled selected>-- pilih Jabatan Pasangan --</option>
                                    <option value="komisaris">Komisaris</option>
                                    <option value="direksi">Direksi</option>
                                    <option value="manajer">Manajer</option>
                                    <option value="staf">Staf</option>
                                    <option value="pemilik">Pemilik</option>
                                    <option value="pengawas">Pengawas</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat Perusaan Pasangan</label>
                                <input type="text" name="alamat_perusaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kota Perusaan Pasangan</label>
                                <input type="text" name="kota_perusaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Provinsi Perusaan Pasangan</label>
                                <input type="text" name="provinsi_perusaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kode Pos Perusaan Pasangan</label>
                                <input type="text" name="kode_pos_perusaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Telpon Perusaan Pasangan</label>
                                <input type="text" name="telpon_perusaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email Perusaan Pasangan</label>
                                <input type="text" name="email_perusaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Fax Perusaan Pasangan</label>
                                <input type="text" name="fax_perusaan_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jenis Usaha Pasangan</label>
                                <input type="text" name="jenis_usaha_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Lama Bekerja Pasangan</label>
                                <input type="text" name="lama_bekerja_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Penghasilan Kotor Per Tahun Pasangan</label>
                                <input type="text" name="penghasilan_kotor_per_tahun_pasangan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Sumber Penghasilan Utama Pasangan</label>
                                <select name="sumber_penghasilan_utama_pasangan" class="form-control" id="">
                                    <option disabled selected>-- pilih Sumber Penghasilan Utama Pasangan --</option>
                                    <option value="gaji">Gaji</option>
                                    <option value="hasil_usaha">Hasil Usaha</option>
                                    <option value="warisan">Warisan</option>
                                    <option value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
                                    <option value="hibah">Hibah</option>
                                    <option value="dari_suami/istri">Dari Suami/Istri</option>
                                    <option value="hasil_investasi">Hasil Investasi</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Pekerjaan</label>
                                <input type="text" name="nama_pekerjaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Pekerjaan</label>
                                <input type="text" name="nama_pekerjaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jabatan</label>
                                <select name="jabatan" class="form-control" id="">
                                    <option disabled selected>-- pilih Jabatan --</option>
                                    <option value="komisaris">Komisaris</option>
                                    <option value="direksi">Direksi</option>
                                    <option value="manajer">Manajer</option>
                                    <option value="staf">Staf</option>
                                    <option value="pemilik">Pemilik</option>
                                    <option value="pengawas">Pengawas</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Alamat Perusahaan</label>
                                <input type="text" name="alamat_perusahaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kota Perusahaan</label>
                                <input type="text" name="kota_perusahaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Provinsi Perusahaan</label>
                                <input type="text" name="provinsi_perusahaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kode Pos Perusahaan</label>
                                <input type="text" name="Kode_pos_perusahaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Telpon Perusahaan</label>
                                <input type="text" name="telpon_perusahaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email Perusahaan</label>
                                <input type="text" name="email_perusahaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Fax Perusahaan</label>
                                <input type="text" name="fax_perusahaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jenis Usaha</label>
                                <input type="text" name="jenis_usaha" class="form-control">
                            </div>
                            \<div class="form-group col-md-6">
                                <label for="">Lama Bekerja</label>
                                <input type="text" name="lama_bekerja" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Sumber Penghasilan Utama</label>
                                <select name="sumber_penghasilan_utama" class="form-control" id="">
                                    <option disabled selected>-- pilih Sumber Penghasilan Utama --</option>
                                    <option value="gaji">Gaji</option>
                                    <option value="hasil_usaha">Hasil Usaha</option>
                                    <option value="warisan">Warisan</option>
                                    <option value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
                                    <option value="hibah">Hibah</option>
                                    <option value="dari_suami/istri">Dari Suami/Istri</option>
                                    <option value="hasil_investasi">Hasil Investasi</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Penghasilan Lainnya</label>
                                <input type="text" name="penghasilan_lainnya" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Sumber Penghasilan Lainnya</label>
                                <select name="sumber_penghasilan_lainnya" class="form-control" id="">
                                    <option disabled selected>-- pilih Sumber Penghasilan Lainnya --</option>
                                    <option value="gaji">Gaji</option>
                                    <option value="hasil_usaha">Hasil Usaha</option>
                                    <option value="warisan">Warisan</option>
                                    <option value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
                                    <option value="hibah">Hibah</option>
                                    <option value="dari_suami/istri">Dari Suami/Istri</option>
                                    <option value="hasil_investasi">Hasil Investasi</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Sumber Dana Investasi</label>
                                <select name="sumber_dana_investasi" class="form-control" id="">
                                    <option disabled selected>-- pilih Sumber Dana Investasi --</option>
                                    <option value="gaji">Gaji</option>
                                    <option value="hasil_usaha">Hasil Usaha</option>
                                    <option value="warisan">Warisan</option>
                                    <option value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
                                    <option value="hibah">Hibah</option>
                                    <option value="dari_suami/istri">Dari Suami/Istri</option>
                                    <option value="hasil_investasi">Hasil Investasi</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Agen Pemasaran</label>
                                <input type="date" name="tanggal_agen_pemasaran" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Pejabat Berwenang</label>
                                <input type="date" name="tanggal_pejabat_berwenang" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nomor Sk3s</label>
                                <input type="text" name="Nomor_sk3s" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Seri Spmpkop</label>
                                <input type="text" name="seri_spmpkop" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Seri Formulir</label>
                                <input type="text" name="seri_formulir" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jumlah Saham</label>
                                <input type="text" name="jumlah_saham" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jumlah Saham Terbilang</label>
                                <input type="text" name="jumlah_saham_terbilang" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jenis Mata Uang</label>
                                <select name="jenis_mata_uang" class="form-control" id="">
                                    <option disabled selected>-- pilih Jenis Mata Uang --</option>
                                    <option value="idr">Rupiah</option>
                                    <option value="usd">Dollar</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Pembayaran Nomor Rekening</label>
                                <input type="text" name="pembayaran_nomor_rekening" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Pembayaran Nama Rekening</label>
                                <input type="text" name="pembayaran_nama_rekening" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Pembayaran Nama Bank</label>
                                <input type="text" name="pembayaran_nama_bank" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nomor Sk3s Lama</label>
                                <input type="text" name="nomor_sk3s_lama" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jumlah Lembar</label>
                                <input type="text" name="jumlah_lembar" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nomor Saham</label>
                                <input type="text" name="nomor_saham" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Ditetapkan</label>
                                <input type="date" name="tanggal_ditetapkan" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('submit','#form-hapus',function (event){
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                typeData: "JSON",
                data: new FormData(this),
                processData:false,
                contentType:false,
                success : function(res) {
                    $("#btnSubmit"). attr("disabled", true);
                    toastr.success(res.text, 'Yeay, Berhasil');
                    setTimeout(function () {
                        window.location.href=res.url;
                    } , 100);
                },
                error:function(xhr){
                    toastr.error(xhr.responseJSON.text, 'Ooopps, Ada Kesalahan');
                }
            })
        });
    </script>
@endpush
