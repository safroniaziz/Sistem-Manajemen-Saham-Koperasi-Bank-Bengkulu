<div class="form-group col-md-6">
    <label for="">Kelengkapan Dokumen: <a style="color:red">(*)</a></label>
    <select name="kelengkapan_dokumen" id="kelengkapan_dokumen" class="form-control">
        <option value="" selected disabled>-- pilih opsi --</option>
        <option {{ $institusi->dokumenPendukung->kelengkapan_dokumen == "ada" ? 'selected' : '' }} value="ada">Ada</option>
        <option {{ $institusi->dokumenPendukung->kelengkapan_dokumen == "tidak" ? 'selected' : '' }} value="tidak">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Profil Resiko: <a style="color:red">(*)</a></label>
    <select name="profil_resiko" id="profil_resiko" class="form-control">
        <option value="" selected disabled>-- pilih opsi --</option>
        <option {{ $institusi->dokumenPendukung->profil_resiko == "ada" ? 'selected' : '' }} value="ada">Ada</option>
        <option {{ $institusi->dokumenPendukung->profil_resiko == "tidak" ? 'selected' : '' }} value="tidak">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Bukti Setoran: <a style="color:red">(*)</a></label>
    <select name="bukti_setoran" id="bukti_setoran" class="form-control">
        <option value="" selected disabled>-- pilih opsi --</option>
        <option {{ $institusi->dokumenPendukung->bukti_setoran == "ada" ? 'selected' : '' }} value="ada">Ada</option>
        <option {{ $institusi->dokumenPendukung->bukti_setoran == "tidak" ? 'selected' : '' }} value="tidak">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Ttd Penerima Kuasa: <a style="color:red">(*)</a></label>
    <select name="ttd_penerima_kuasa" id="ttd_penerima_kuasa" class="form-control">
        <option value="" selected disabled>-- pilih opsi --</option>
        <option {{ $institusi->dokumenPendukung->ttd_penerima_kuasa == "ada" ? 'selected' : '' }} value="ada">Ada</option>
        <option {{ $institusi->dokumenPendukung->ttd_penerima_kuasa == "tidak" ? 'selected' : '' }} value="tidak">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Formulir Fatca: <a style="color:red">(*)</a></label>
    <select name="fatca" id="fatca" class="form-control">
        <option value="" selected disabled>-- pilih opsi --</option>
        <option {{ $institusi->dokumenPendukung->fatca == "ada" ? 'selected' : '' }} value="ada">Ada</option>
        <option {{ $institusi->dokumenPendukung->fatca == "tidak" ? 'selected' : '' }} value="tidak">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Persetujuan: <a style="color:red">(*)</a></label>
    <select name="persetujuan" id="persetujuan" class="form-control">
        <option value="" selected disabled>-- pilih opsi --</option>
        <option {{ $institusi->dokumenPendukung->persetujuan == "ada" ? 'selected' : '' }} value="ada">Ada</option>
        <option {{ $institusi->dokumenPendukung->persetujuan == "tidak" ? 'selected' : '' }} value="tidak">Tidak Ada</option>
    </select>
</div>