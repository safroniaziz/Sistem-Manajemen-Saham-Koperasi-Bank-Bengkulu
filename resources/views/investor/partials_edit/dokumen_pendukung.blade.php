<div class="form-group col-md-6">
    <label for="">Fotokopi KTP/Paspor</a></label>
    <select name="ktp" class="form-control" id="ktp">
        <option selected disabled>-- pilih status --</option> == "hibah" ? 'selected' : ''}} value="" selected disabled>-- pilih status --</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->ktp == "1" ? 'selected' : ''}} value="1">Ada</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->ktp == "0" ? 'selected' : ''}} value="0">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Fotokopi NPWP</a></label>
    <select name="npwp" class="form-control" id="npwp">
        <option selected disabled>-- pilih status --</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->npwp == "1" ? 'selected' : ''}} value="1">Ada</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->npwp == "0" ? 'selected' : ''}} value="0">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Fotokopi Form Profil Resiko Pemodal</a></label>
    <select name="form_profil_resiko_pemodal" class="form-control" id="form_profil_resiko_pemodal">
        <option selected disabled>-- pilih status --</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->form_profil_resiko_pemodal == "1" ? 'selected' : ''}} value="1">Ada</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->form_profil_resiko_pemodal == "0" ? 'selected' : ''}} value="0">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Fotokopi Bukti Setoran Investasi Awal</a></label>
    <select name="bukti_setoran_investasi_awal" class="form-control" id="bukti_setoran_investasi_awal">
        <option selected disabled>-- pilih status --</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->bukti_setoran_investasi_awal == "1" ? 'selected' : ''}} value="1">Ada</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->bukti_setoran_investasi_awal == "0" ? 'selected' : ''}} value="0">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Contoh Tanda Tangan</a></label>
    <select name="contoh_tanda_tangan" class="form-control" id="contoh_tanda_tangan">
        <option selected disabled>-- pilih status --</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->contoh_tanda_tangan == "1" ? 'selected' : ''}} value="1">Ada</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->contoh_tanda_tangan == "0" ? 'selected' : ''}} value="0">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Formulir FATCA - Perorangan (non mandatory)</label>
    <select name="fatca" class="form-control" id="fatca">
        <option selected disabled>-- pilih status --</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->formulir_fatca == "1" ? 'selected' : ''}} value="1">Ada</option>
        <option {{ $dataInvestor->dokumenPendukungInvestor->formulir_fatca == "0" ? 'selected' : ''}} value="0">Tidak Ada</option>
    </select>
</div>