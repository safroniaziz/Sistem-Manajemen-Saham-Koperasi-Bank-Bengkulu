<div class="form-group col-md-6">
    <label for="">Nama Pasangan</label>
    <input type="text" name="nama_pasangan" value="{{ $dataInvestor->pasanganOrangTuaInvestor->nama_pasangan }}" id="nama_pasangan" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Hubungan</label>
    <input type="text" name="hubungan" value="{{ $dataInvestor->pasanganOrangTuaInvestor->hubungan }}" id="hubungan" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Alamat Pasangan</label>
    <input type="text" name="alamat_pasangan" value="{{ $dataInvestor->pasanganOrangTuaInvestor->alamat_pasangan }}" id="alamat_pasangan" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Telpon Rumah Pasangan</label>
    <input type="text" name="telpon_rumah_pasangan" value="{{ $dataInvestor->pasanganOrangTuaInvestor->telepon_rumah_pasangan }}" id="telpon_rumah_pasangan" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Ponsel Pasangan</label>
    <input type="text" name="ponsel_pasangan" value="{{ $dataInvestor->pasanganOrangTuaInvestor->ponsel_pasangan }}" id="ponsel_pasangan" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Pekerjaan Pasangan</label>
    <select name="pekerjaan_pasangan" id="pekerjaan_pasangan" class="form-control">
        <option value="" selected disabled>-- pilih pekerjaan --</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'selected' : ''}} value="tidak_bekerja">Tidak Bekerja</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "advokat" ? 'selected' : ''}} value="advokat">Advokat</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "akuntan" ? 'selected' : ''}} value="akuntan">Akuntan</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "apoteker" ? 'selected' : ''}} value="apoteker">Apoteker</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "arsitek" ? 'selected' : ''}} value="arsitek">Arsitek</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "atlet" ? 'selected' : ''}} value="atlet">Atlet</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "dokter" ? 'selected' : ''}} value="dokter">Dokter</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "ilmuwan" ? 'selected' : ''}} value="ilmuwan">Ilmuwan</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "pengusaha" ? 'selected' : ''}} value="pengusaha">Pengusaha</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "karyawan" ? 'selected' : ''}} value="karyawan">Karyawan</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "manajer" ? 'selected' : ''}} value="manajer">Manajer</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
    </select>
</div>
<div id="pekerjaan-pasangan">
    <div class="form-group col-md-6">
        <label for="">Perusahaan Pasangan</label>
        <input type="text" name="perusahaan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->perusahaan_pasangan }}" id="perusahaan_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Jabatan Pasangan</label>
        <select name="jabatan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} id="jabatan_pasangan" class="form-control" id="">
            <option disabled selected>-- pilih Jabatan Pasangan --</option>
            <option {{ $dataInvestor->pasanganOrangTuaInvestor->jabatan_pasangan  == "komisaris" ? 'selected' : ''}} value="komisaris">Komisaris</option>
            <option {{ $dataInvestor->pasanganOrangTuaInvestor->jabatan_pasangan  == "direksi" ? 'selected' : ''}} value="direksi">Direksi</option>
            <option {{ $dataInvestor->pasanganOrangTuaInvestor->jabatan_pasangan  == "manajer" ? 'selected' : ''}} value="manajer">Manajer</option>
            <option {{ $dataInvestor->pasanganOrangTuaInvestor->jabatan_pasangan  == "staf" ? 'selected' : ''}} value="staf">Staf</option>
            <option {{ $dataInvestor->pasanganOrangTuaInvestor->jabatan_pasangan  == "pemilik" ? 'selected' : ''}} value="pemilik">Pemilik</option>
            <option {{ $dataInvestor->pasanganOrangTuaInvestor->jabatan_pasangan  == "pengawas" ? 'selected' : ''}} value="pengawas">Pengawas</option>
            <option {{ $dataInvestor->pasanganOrangTuaInvestor->jabatan_pasangan  == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="">Alamat Perusahaan Pasangan</label>
        <input type="text" name="alamat_perusahaan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->alamat_perusahaan_pasangan }}" id="alamat_perusahaan_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Kota Perusahaan Pasangan</label>
        <input type="text" name="kota_perusahaan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->kota_perusahaan_pasangan }}" id="kota_perusahaan_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Provinsi Perusahaan Pasangan</label>
        <input type="text" name="provinsi_perusahaan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->provinsi_perusahaan_pasangan }}" id="provinsi_perusahaan_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Kode Pos Perusahaan Pasangan</label>
        <input type="text" name="kode_pos_perusahaan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->kode_pos_perusahaan_pasangan }}" id="kode_pos_perusahaan_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Telpon Perusahaan Pasangan</label>
        <input type="text" name="telpon_perusahaan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->telpon_perusahaan_pasangan }}" id="telpon_perusahaan_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Email Perusahaan Pasangan</label>
        <input type="text" name="email_perusahaan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->email_perusahaan_pasangan }}" id="email_perusahaan_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Fax Perusahaan Pasangan</label>
        <input type="text" name="fax_perusahaan_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->fax_perusahaan_pasangan }}" id="fax_perusahaan_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Jenis Usaha Pasangan</label>
        <input type="text" name="jenis_usaha_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->jenis_usaha_pasangan }}" id="jenis_usaha_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Lama Bekerja Pasangan</label>
        <input type="text" name="lama_bekerja_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->lama_bekerja_pasangan }}" id="lama_bekerja_pasangan" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label for="">Penghasilan Kotor Per Tahun Pasangan</label>
        <input type="text" name="penghasilan_kotor_per_tahun_pasangan" {{ $dataInvestor->pasanganOrangTuaInvestor->pekerjaan_pasangan == "tidak_bekerja" ? 'disabled' : '' }} value="{{ $dataInvestor->pasanganOrangTuaInvestor->penghasilan_kotor_per_tahun_pasangan }}" id="penghasilan_kotor_per_tahun_pasangan" class="form-control">
    </div>
</div>
<div class="form-group col-md-6">
    <label for="">Sumber Penghasilan Utama Pasangan</label>
    <select name="sumber_penghasilan_utama_pasangan" id="sumber_penghasilan_utama_pasangan" class="form-control" id="">
        <option disabled selected>-- pilih Sumber Penghasilan Utama Pasangan --</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->sumber_penghasilan_utama_pasangan == "gaji" ? 'selected' : ''}} value="gaji">Gaji</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->sumber_penghasilan_utama_pasangan == "hasil_usaha" ? 'selected' : ''}} value="hasil_usaha">Hasil Usaha</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->sumber_penghasilan_utama_pasangan == "warisan" ? 'selected' : ''}} value="warisan">Warisan</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->sumber_penghasilan_utama_pasangan == "dari_orang_tua" ? 'selected' : ''}} value="dari_orang_tua/anak">Dari Orang Tua/Anak</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->sumber_penghasilan_utama_pasangan == "hibah" ? 'selected' : ''}} value="hibah">Hibah</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->sumber_penghasilan_utama_pasangan == "dari_suami" ? 'selected' : ''}} value="dari_suami/istri">Dari Suami/Istri</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->sumber_penghasilan_utama_pasangan == "hasil_investasi" ? 'selected' : ''}} value="hasil_investasi">Hasil Investasi</option>
        <option {{ $dataInvestor->pasanganOrangTuaInvestor->sumber_penghasilan_utama_pasangan == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
    </select>
</div>