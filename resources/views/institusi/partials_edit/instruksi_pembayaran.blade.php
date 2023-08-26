<div class="form-group col-md-6">
    <label for="">Nama Pemilik Bank: <a style="color:red">(*)</a></label>
    <input type="text" name="nama_pemilik_bank" value="{{ $institusi->instruksiPembayaran->nama_pemilik_bank }}" id="nm_pemilik_bank" class="form-control" placeholder="Masukan nama pemilik bank">
</div>

<div class="form-group col-md-6">
    <label for="">Nama Bank: <a style="color:red">(*)</a></label>
    <input type="text" name="nama_bank" value="{{ $institusi->instruksiPembayaran->nama_bank }}" class="form-control" id="nm_bank" placeholder="Masukan nama bank">
</div>

<div class="form-group col-md-6">
    <label for="">No Rekening Bank: <a style="color:red">(*)</a></label>
    <input type="text" name="nomor_rekening" value="{{ $institusi->instruksiPembayaran->nomor_rekening }}" class="form-control" id="no_rek" placeholder="Masukan Nomor Rekening">
</div>