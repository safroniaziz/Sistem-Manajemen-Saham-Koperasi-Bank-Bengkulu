<div class="form-group col-md-6">
    <label for="">Nama Penerima Kuasa: <a style="color:red">(*)</a></label>
    <input type="text" name="nama_kuasa" value="{{ $institusi->penerimaKuasaTransaksi->nama_kuasa }}" id="nm_kuasa"  class="form-control" placeholder="Masukan nama kuasa">
</div>

<div class="form-group col-md-6">
    <label for="">Nomor Identitas: <a style="color:red">(* hanya angka)</a></label>
    <input type="number" name="nomor_identitas_kuasa" value="{{ $institusi->penerimaKuasaTransaksi->nomor_identitas }}" id="no_identitas_kuasa"  class="form-control" placeholder="Masukan no identitas">
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Kadaluarsa Identitas: <a style="color:red">(*)</a></label>
    <input type="date" name="tgl_kadaluarsa_identitas_kuasa" value="{{ $institusi->penerimaKuasaTransaksi->tgl_kadaluarsa_identitas }}" id="tgl_kadaluarsa_identitas_kuasa"  class="form-control">
</div>

<div class="form-group col-md-6">
    <label for="">Jabatan: <a style="color:red">(*)</a></label>
    <input type="text" name="jabatan_kuasa" value="{{ $institusi->penerimaKuasaTransaksi->jabatan }}" id="jabatan_kuasa"  class="form-control" placeholder="Masukan jabatan">
</div>

<div class="form-group col-md-6">
    <label for="">No Telephone: <a style="color:red">(* hanya angka)</a></label>
    <input type="number" name="telephone_kuasa" value="{{ $institusi->penerimaKuasaTransaksi->telephone }}" id="telephone_kuasa"  class="form-control" placeholder="Masukan no telephone">
</div>