<div class="form-group col-md-6">
    <label for="">Masukan Nomor Register</label>
    <input type="text" name="nomor_register" value="{{ $dataInvestor->nomor_register }}" id="nomor_register" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Pilih Nama Investor</label>
    <input type="text" name="nama_investor" value="{{ $dataInvestor->nama_investor }}" id="nama_investor" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" value="{{ $dataInvestor->tempat_lahir }}" id="tempat_lahir" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" value="{{ $dataInvestor->tanggal_lahir }}" id="tanggal_lahir" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Status Perkawinan</label>
    <select name="status_perkawinan" id="status_perkawinan" class="form-control" id="">
        <option disabled selected>-- pilih status perkawinan --</option>
        <option {{ $dataInvestor->status_perkawinan == "menikah" ? 'selected' : '-' }} value="menikah">Menikah</option>
        <option {{ $dataInvestor->status_perkawinan == "belum_menikah" ? 'selected' : '-' }} value="belum_menikah">Belum Menikah</option>
        <option {{ $dataInvestor->status_perkawinan == "janda" ? 'selected' : '-' }} value="janda/duda">Janda/Duda</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="">Kewarganegaraan</label>
    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" id="">
        <option disabled selected>-- pilih kewarganegaraan --</option>
        <option {{ $dataInvestor->kewarganegaraan == "wni" ? 'selected' : '-' }} value="wni">Warga Negara Indonesia</option>
        <option {{ $dataInvestor->kewarganegaraan == "wna" ? 'selected' : '-' }} value="wna">Warga Negara Asing</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="">Jenis Rekening</label>
    <select name="jenis_rekening" id="jenis_rekening" class="form-control" id="">
        <option disabled selected>-- pilih jenis rekening --</option>
        <option {{ $dataInvestor->jenis_rekening == "perorangan" ? 'selected' : '-'}} value="perorangan">Perorangan</option>
        <option {{ $dataInvestor->jenis_rekening == "nonperorangan" ? 'selected' : '-'}} value="nonperorangan">Nonperorangan</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="">Profil Resiko Nasaba</label>
    <input type="text" name="profil_resiko_nasabah" value="{{ $dataInvestor->profil_resiko_nasabah }}" id="profil_resiko_nasabah" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Jenis Kelamin</label>
    <input type="text" name="jenis_kelamin" value="{{ $dataInvestor->jenis_kelamin }}" id="jenis_kelamin" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Nomor KTP</label>
    <input type="text" name="nomor_ktp" value="{{ $dataInvestor->nomor_ktp }}" id="nomor_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Tanggal Kadaluarsa KTP</label>
    <input type="date" name="tanggal_kadaluarsa_ktp" value="{{ $dataInvestor->tanggal_kadaluarsa_ktp }}" id="tanggal_kadaluarsa_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Nomor NPWP</label>
    <input type="text" name="nomor_npwp" value="{{ $dataInvestor->nomor_npwp }}" id="nomor_npwp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Tanggal Registrasi Npwp</label>
    <input type="date" name="tanggal_registrasi_npwp" value="{{ $dataInvestor->tanggal_registrasi_npwp }}" id="tanggal_registrasi_npwp" class="form-control">
</div>

<div class="form-group col-md-6">
    <label for="">Nama Ahli Waris</label>
    <input type="text" name="nama_ahli_waris" value="{{ $dataInvestor->nama_ahli_waris }}" id="nama_ahli_waris" class="form-control">
</div>

<div class="form-group col-md-6">
    <label for="">Hubungan Ahli Waris</label>
    <input type="text" name="hubungan_ahli_waris" value="{{ $dataInvestor->hubungan_ahli_waris }}" id="hubungan_ahli_waris" class="form-control">
</div>