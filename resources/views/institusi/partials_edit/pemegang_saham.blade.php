<div class="form-group col-md-6">
    <label for="">Nama Pemegang Saham: <a style="color:red">(*)</a></label>
    <input type="text" name="nama_pemegang_saham" value="{{ $institusi->pemegangSaham->nama_pemegang_saham }}" id="nm_pemegang_saham" class="form-control" placeholder="Masukan nama pemegang saham">
</div>

<div class="form-group col-md-6">
    <label for="">Komposisi Pemegang Saham (%): <a style="color:red">(* angka)</a></label>
    <input type="number" name="komposisi_pemegang_saham" value="{{ $institusi->pemegangSaham->komposisi_pemegang_saham }}" class="form-control" id="komposisi_pemegang_saham" placeholder="Masukan komposisi pemegang saham">
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Pernyataan: <a style="color:red">(*)</a></label>
    <input type="date" name="tanggal_pernyataan" value="{{ $institusi->pemegangSaham->tanggal_pernyataan }}" class="form-control" id="tanggal_pernyataan">
</div>

<div class="form-group col-md-6">
    <label for="">Yang Menyatakan: <a style="color:red">(*)</a></label>
    <input type="text" name="yang_menyatakan" value="{{ $institusi->pemegangSaham->yang_menyatakan }}" class="form-control" id="yang_menyatakan" placeholder="masukan yang menyatakan">
</div>