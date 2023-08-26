<div class="form-group col-md-6">
    <label for="">Nama Pekerjaan</label>
    <select name="nama_pekerjaan" id="nama_pekerjaan" class="form-control">
        <option selected disabled>-- pilih pekerjaan --</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'selected' : ''}} value="tidak_bekerja">Tidak Bekerja</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "advokat" ? 'selected' : ''}} value="advokat">Advokat</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "akuntan" ? 'selected' : ''}} value="akuntan">Akuntan</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "apoteker" ? 'selected' : ''}} value="apoteker">Apoteker</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "arsitek" ? 'selected' : ''}} value="arsitek">Arsitek</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "atlet" ? 'selected' : ''}} value="atlet">Atlet</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "dokter" ? 'selected' : ''}} value="dokter">Dokter</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "ilmuwan" ? 'selected' : ''}} value="ilmuwan">Ilmuwan</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "pengusaha" ? 'selected' : ''}} value="pengusaha">Pengusaha</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "karyawan" ? 'selected' : ''}} value="karyawan">Karyawan</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "manajer" ? 'selected' : ''}} value="manajer">Manajer</option>
        <option {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
    </select>
</div>
<div id="info-pekerjaan">
    <div class="form-group col-md-6">
        <label for="">Nama Perusahaan</label>
        <input type="text" name="nama_perusahaan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->nama_perusahaan }}" id="nama_perusahaan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Jabatan</label>
        <select name="jabatan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} id="jabatan" class="form-control" id="">
            <option disabled selected>-- pilih Jabatan --</option>
            <option {{ $dataInvestor->pekerjaanInvestor->jabatan == "komisaris" ? 'selected' : ''}} value="komisaris">Komisaris</option>
            <option {{ $dataInvestor->pekerjaanInvestor->jabatan == "direksi" ? 'selected' : ''}} value="direksi">Direksi</option>
            <option {{ $dataInvestor->pekerjaanInvestor->jabatan == "manajer" ? 'selected' : ''}} value="manajer">Manajer</option>
            <option {{ $dataInvestor->pekerjaanInvestor->jabatan == "staf" ? 'selected' : ''}} value="staf">Staf</option>
            <option {{ $dataInvestor->pekerjaanInvestor->jabatan == "pemilik" ? 'selected' : ''}} value="pemilik">Pemilik</option>
            <option {{ $dataInvestor->pekerjaanInvestor->jabatan == "pengawas" ? 'selected' : ''}} value="pengawas">Pengawas</option>
            <option {{ $dataInvestor->pekerjaanInvestor->jabatan == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="">Alamat Perusahaan</label>
        <input type="text" name="alamat_perusahaan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->alamat_perusahaan }}" id="alamat_perusahaan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Kota Perusahaan</label>
        <input type="text" name="kota_perusahaan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->kota_perusahaan }}" id="kota_perusahaan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Provinsi Perusahaan</label>
        <input type="text" name="provinsi_perusahaan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->provinsi_perusahaan }}" id="provinsi_perusahaan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Kode Pos Perusahaan</label>
        <input type="text" name="Kode_pos_perusahaan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->Kode_pos_perusahaan }}" id="Kode_pos_perusahaan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Telpon Perusahaan</label>
        <input type="text" name="telpon_perusahaan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->telpon_perusahaan }}" id="telpon_perusahaan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Email Perusahaan</label>
        <input type="text" name="email_perusahaan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->email_perusahaan }}" id="email_perusahaan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Fax Perusahaan</label>
        <input type="text" name="fax_perusahaan" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->fax_perusahaan }}" id="fax_perusahaan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Jenis Usaha</label>
        <input type="text" name="jenis_usaha" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->jenis_usaha }}" id="jenis_usaha" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Lama Bekerja</label>
        <input type="text" name="lama_bekerja" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->lama_bekerja }}" id="lama_bekerja" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Penghasilan Lainnya</label>
        <input type="text" name="penghasilan_lainnya" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->penghasilan_lainnya }}" id="penghasilan_lainnya" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Sumber Penghasilan Lainnya</label>
        <select name="sumber_penghasilan_lainnya" {{ $dataInvestor->pekerjaanInvestor->nama_pekerjaan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_lainnya }}" id="sumber_penghasilan_lainnya" class="form-control" id="">
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
</div>
<div class="form-group col-md-6">
    <label for="">Sumber Penghasilan Utama</label>
    <select name="sumber_penghasilan_utama" id="sumber_penghasilan_utama" class="form-control" id="">
        <option disabled selected>-- pilih Sumber Penghasilan Utama --</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_utama == "gaji" ? 'selected' : ''}} value="gaji">Gaji</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_utama == "hasil_usaha" ? 'selected' : ''}} value="hasil_usaha">Hasil Usaha</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_utama == "warisan" ? 'selected' : ''}} value="warisan">Warisan</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_utama == "dari_orang_tua/anak" ? 'selected' : ''}} value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_utama == "hibah" ? 'selected' : ''}} value="hibah">Hibah</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_utama == "dari_suami/istri" ? 'selected' : ''}} value="dari_suami/istri">Dari Suami/Istri</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_utama == "hasil_investasi" ? 'selected' : ''}} value="hasil_investasi">Hasil Investasi</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_penghasilan_utama == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="">Sumber Dana Investasi</label>
    <select name="sumber_dana_investasi" id="sumber_dana_investasi" class="form-control" id="">
        <option disabled selected>-- pilih Sumber Dana Investasi --</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_dana_investasi == "gaji" ? 'selected' : ''}} value="gaji">Gaji</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_dana_investasi == "hasil_usaha" ? 'selected' : ''}} value="hasil_usaha">Hasil Usaha</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_dana_investasi == "warisan" ? 'selected' : ''}} value="warisan">Warisan</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_dana_investasi == "dari_orang_tua" ? 'selected' : ''}} value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_dana_investasi == "hibah" ? 'selected' : ''}} value="hibah">Hibah</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_dana_investasi == "dari_suami" ? 'selected' : ''}} value="dari_suami/istri">Dari Suami/Istri</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_dana_investasi == "hasil_investasi" ? 'selected' : ''}} value="hasil_investasi">Hasil Investasi</option>
        <option {{ $dataInvestor->pekerjaanInvestor->sumber_dana_investasi == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
    </select>
</div>
