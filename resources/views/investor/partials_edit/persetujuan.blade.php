<div class="form-group col-md-6">
    <label for="">Nama Agen Pemasaran</a></label> <br>
    <select name="agen_pemasaran_id" id="agen_pemasaran_id" class="form-control" >
        <option value="" disabled selected>-- pilih agen pemasaran --</option>
        @foreach ($agenPemasarans as $agen)
            <option {{ $dataInvestor->persetujuanInvestor->agen_pemasaran_id == $agen->id ? 'selected' : '' }} value="{{ $agen->id }}">{{ $agen->nama_agen_pemasaran }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Tanda Tangan Agen Pemasaran</a></label> <br>
    <select name="tanda_tangan_agen_pemasaran" class="form-control" id="tanda_tangan_agen_pemasaran" >
        <option value="" disabled selected>-- pilih status --</option>
        <option {{ $dataInvestor->persetujuanInvestor->ttd_agen_pemasaran == "1" ? 'selected' : '' }} value="1">Ada</option>
        <option {{ $dataInvestor->persetujuanInvestor->ttd_agen_pemasaran == "0" ? 'selected' : '' }} value="0">Tidak Ada</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Agen Pemasaran</a></label> <br>
    <input type="date" name="tanggal_agen_pemasaran" value="{{ $dataInvestor->persetujuanInvestor->tanggal_agen_pemasaran }}" class="form-control" id="tanggal_agen_pemasaran"  placeholder="Tanggal Agen Pemasaran">
</div>

<div class="form-group col-md-6">
    <label for="">Nama Pejabat Berwenang</a></label> <br>
    <select name="pejabat_berwenang_id" id="pejabat_berwenang_id" class="form-control" >
        <option value="" disabled selected>-- pilih pejabat berwenang --</option>
        @foreach ($pejabatBerwenangs as $pejabat)
            <option {{ $dataInvestor->persetujuanInvestor->pejabat_berwenang_id == $pejabat->id ? 'selected' : '' }} value="{{ $pejabat->id }}">{{ $pejabat->nama_pejabat_berwenang }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Status Persetujuan</a></label> <br>
    <select name="status_persetujuan" class="form-control" id="status_persetujuan" >
        <option value="" disabled selected>-- pilih status --</option>
        <option {{ $dataInvestor->persetujuanInvestor->status_persetujuan == "1" ? 'selected' : '' }} value="1">Disetujui</option>
        <option {{ $dataInvestor->persetujuanInvestor->status_persetujuan == "0" ? 'selected' : '' }} value="0">Tidak Disetujui</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Pejabat Berwenang</a></label> <br>
    <input type="date" name="tanggal_pejabat_berwenang" value="{{ $dataInvestor->persetujuanInvestor->tanggal_pejabat_berwenang }}" class="form-control" id="tanggal_pejabat_berwenang"  placeholder="Tanggal Pejabat Berwenang">
</div>

<div class="form-group col-md-6">
    <label for="">Tanda Tangan Pejabat Berwenang</a></label> <br>
    <select name="tanda_tangan_pejabat_berwenang" class="form-control" id="tanda_tangan_pejabat_berwenang" >
        <option value="" selected disabled>-- pilih opsi --</option>
        <option {{ $dataInvestor->persetujuanInvestor->ttd_pejabat_berwenang == "1" ? 'selected' : '' }} value="1">Ada</option>
        <option {{ $dataInvestor->persetujuanInvestor->ttd_pejabat_berwenang == "0" ? 'selected' : '' }} value="0">Tidak Ada</option>
    </select>
</div>