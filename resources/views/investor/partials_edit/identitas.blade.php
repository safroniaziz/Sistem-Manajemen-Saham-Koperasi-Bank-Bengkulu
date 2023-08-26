<div class="form-group col-md-6">
    <label for="">Alamat KTP</label>
    <input type="text" name="alamat_ktp" value="{{ $dataInvestor->identitasInvestor->alamat_ktp }}" id="alamat_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Rt KTP</label>
    <input type="text" name="rt_ktp" value="{{ $dataInvestor->identitasInvestor->rt_ktp }}" id="rt_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Rw KTP</label>
    <input type="text" name="rw_ktp" value="{{ $dataInvestor->identitasInvestor->rw_ktp }}" id="rw_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Kelurahan KTP</label>
    <input type="text" name="kelurahan_ktp" value="{{ $dataInvestor->identitasInvestor->kelurahan_ktp }}" id="kelurahan_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Kecamatan KTP</label>
    <input type="text" name="kecamatan_ktp" value="{{ $dataInvestor->identitasInvestor->kecamatan_ktp }}" id="kecamatan_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Kota KTP</label>
    <input type="text" name="kota_ktp" value="{{ $dataInvestor->identitasInvestor->kota_ktp }}" id="kota_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Provinsi KTP</label>
    <input type="text" name="provinsi_ktp" value="{{ $dataInvestor->identitasInvestor->provinsi_ktp }}" id="provinsi_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Kode Pos KTP</label>
    <input type="text" name="kode_pos_ktp" value="{{ $dataInvestor->identitasInvestor->kode_pos_ktp }}" id="kode_pos_ktp" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Alamat Tempat Tinggal</label>
    <input type="text" name="alamat_tempat_tinggal" value="{{ $dataInvestor->identitasInvestor->alamat_tempat_tinggal }}" id="alamat_tempat_tinggal" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Rt Tempat tinggal</label>
    <input type="text" name="rt_tempat_tinggal" value="{{ $dataInvestor->identitasInvestor->rt_tempat_tinggal }}" id="rt_tempat_tinggal" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Rw Tempat Tinggal</label>
    <input type="text" name="rw_tempat_tinggal" value="{{ $dataInvestor->identitasInvestor->rw_tempat_tinggal }}" id="rw_tempat_tinggal" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Kelurahan Tempat Tinggal</label>
    <input type="text" name="kelurahan_tempat_tinggal" value="{{ $dataInvestor->identitasInvestor->kelurahan_tempat_tinggal }}" id="kelurahan_tempat_tinggal" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Kecamatan Tempat Tinggal</label>
    <input type="text" name="kecamatan_tempat_tinggal" value="{{ $dataInvestor->identitasInvestor->kecamatan_tempat_tinggal }}" id="kecamatan_tempat_tinggal" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Kota Tempat Tinggal</label>
    <input type="text" name="kota_tempat_tinggal" value="{{ $dataInvestor->identitasInvestor->kota_tempat_tinggal }}" id="kota_tempat_tinggal" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Provinsi Tempat Tinggal</label>
    <input type="text" name="provinsi_tempat_tinggal" value="{{ $dataInvestor->identitasInvestor->provinsi_tempat_tinggal }}" id="provinsi_tempat_tinggal" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Kode Pos Tempat Tinggal</label>
    <input type="text" name="kode_pos_tempat_tinggal" value="{{ $dataInvestor->identitasInvestor->kode_pos_tempat_tinggal }}" id="kode_pos_tempat_tinggal" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Telpon Rumah</label>
    <input type="text" name="telpon_rumah" value="{{ $dataInvestor->identitasInvestor->telpon_rumah }}" id="telpon_rumah" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Ponsel</label>
    <input type="text" name="ponsel" value="{{ $dataInvestor->identitasInvestor->ponsel }}" id="ponsel" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Lama Menetap</label>
    <input type="text" name="lama_menempati" value="{{ $dataInvestor->identitasInvestor->lama_menempati }}" id="lama_menempati" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Status Rumah Tinggal</label>
    <select name="status_rumah_tinggal" id="status_rumah_tinggal" class="form-control" id="">
        <option disabled selected>-- pilih Status Rumah Tinggal --</option>
        <option {{ $dataInvestor->identitasInvestor->status_rumah_tinggal == "milik_sendiri" ? 'selected' : ''}} value="milik_sendiri">Milik Sendiri</option>
        <option {{ $dataInvestor->identitasInvestor->status_rumah_tinggal == "sewa" ? 'selected' : ''}} value="sewa">Sewa</option>
        <option {{ $dataInvestor->identitasInvestor->status_rumah_tinggal == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="">Agama</label>
    <select name="agama" id="agama" class="form-control" id="">
        <option disabled selected>-- pilih Agama --</option>
        <option {{ $dataInvestor->identitasInvestor->agama == "islam" ? 'selected' : ''}} value="islam">Islam</option>
        <option {{ $dataInvestor->identitasInvestor->agama == "protestan" ? 'selected' : ''}} value="protestan">Protestan</option>
        <option {{ $dataInvestor->identitasInvestor->agama == "katolik" ? 'selected' : ''}} value="katolik">Katolik</option>
        <option {{ $dataInvestor->identitasInvestor->agama == "hindu" ? 'selected' : ''}} value="hindu">Hindu</option>
        <option {{ $dataInvestor->identitasInvestor->agama == "buddha" ? 'selected' : ''}} value="buddha">Buddha</option>
        <option {{ $dataInvestor->identitasInvestor->agama == "konghucu" ? 'selected' : ''}} value="konghucu">Konghucu</option>
        <option {{ $dataInvestor->identitasInvestor->agama == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="">Pendidikan Terakhir</label>
    <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control" id="">
        <option disabled selected>-- pilih Pendidikan Terakhir --</option>
        <option {{ $dataInvestor->identitasInvestor->pendidikan_terakhir == "sma" ? 'selected' : ''}} value="sma">SMA</option>
        <option {{ $dataInvestor->identitasInvestor->pendidikan_terakhir == "d3" ? 'selected' : ''}} value="d3">D3</option>
        <option {{ $dataInvestor->identitasInvestor->pendidikan_terakhir == "s1" ? 'selected' : ''}} value="s1">S1</option>
        <option {{ $dataInvestor->identitasInvestor->pendidikan_terakhir == "s2" ? 'selected' : ''}} value="s2">S2</option>
        <option {{ $dataInvestor->identitasInvestor->pendidikan_terakhir == "s3" ? 'selected' : ''}} value="s3">S3</option>
        <option {{ $dataInvestor->identitasInvestor->pendidikan_terakhir == "lainnya" ? 'selected' : ''}} value="lainnya">Lainnya</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label for="">Nama Gadis Ibu Kandung</label>
    <input type="text" name="nama_gadis_ibu_kandung" value="{{ $dataInvestor->identitasInvestor->nama_gadis_ibu_kandung }}" id="nama_gadis_ibu_kandung" class="form-control">
</div>
<div class="form-group col-md-6">
    <label for="">Emergency Kontak</label>
    <input type="text" name="emergency_kontak" value="{{ $dataInvestor->identitasInvestor->emergency_kontak }}" id="emergency_kontak" class="form-control">
</div>