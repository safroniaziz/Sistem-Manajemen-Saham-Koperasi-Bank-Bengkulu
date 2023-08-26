<div class="form-group col-md-6">
    <label for="">Nama Investor: <a style="color:red">(*)</a> </label>
    <input type="text" name="nama_investor" id="nm_investor" class="form-control" placeholder="Masukan nama lengkap">
</div>
<div class="form-group col-md-6">
    <label for="">No Register:  <a style="color:red">(*)</a><a id="noreg_error" style="display:none;color:red;"><i>sudah digunakan</i></a></label>
    <input type="text" name="nomor_register" id="no_register" class="form-control" placeholder="Masukan nomor register">
</div>
<div class="form-group col-md-6">
    <label for="">No CIF:  <a style="color:red">(*)</a><a id="noreg_error" style="display:none;color:red;"><i>sudah digunakan</i></a></label>
    <input type="text" name="nomor_cif" id="nomor_cif" class="form-control" placeholder="Masukan nomor register">
</div>
<div class="form-group col-md-6">
    <label for="">Nama Agen Pemasaran: <a style="color:red">(*)</a></label> <br>
    <select name="agen_pemasaran_id" id="agen_pemasaran_id" class="form-control">
        <option value="" disabled selected>-- pilih agen pemasaran --</option>
        @foreach ($agenPemasarans as $agen)
            <option value="{{ $agen->id }}">{{ $agen->nama_agen_pemasaran }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Nama Pejabat Berwenang 1: <a style="color:red">(*)</a></label> <br>
    <select name="pejabat_berwenang_id1" id="pejabat_berwenang_id1" class="form-control">
        <option value="" disabled selected>-- pilih pejabat berwenang 1--</option>
        @foreach ($pejabatBerwenangs as $pejabat)
            <option value="{{ $pejabat->id }}">{{ $pejabat->nama_pejabat_berwenang }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Nama Pejabat Berwenang 2:</a></label> <br>
    <select name="pejabat_berwenang_id2" id="pejabat_berwenang_id2" class="form-control">
        <option value="" disabled selected>-- pilih pejabat berwenang 2--</option>
        @foreach ($pejabatBerwenangs as $pejabat)
            <option value="{{ $pejabat->id }}">{{ $pejabat->nama_pejabat_berwenang }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Nama Institusi: <a style="color:red">(*)</a></label>
    <input type="text" name="nama_institusi" class="form-control" id="nm_institusi" placeholder="Masukan Nama Institusi">
</div>

<div class="form-group col-md-6">
    <label for="">Kota Institusi: <a style="color:red">(*)</a></label>
    <input type="text" name="kota_institusi" class="form-control" id="kota_institusi" placeholder="Masukan Kota Institusi">
</div>

<div class="form-group col-md-6">
    <label for="">Provinsi Institusi: <a style="color:red">(*)</a></label>
    <input type="text" name="provinsi_institusi" class="form-control" id="provinsi_institusi" placeholder="Masukan Provinsi Institusi">
</div>

<div class="form-group col-md-6">
    <label for="">Negara Institusi: <a style="color:red">(*)</a></label>
    <input type="text" name="negara_institusi" class="form-control" id="negara_institusi" placeholder="Masukan Negara Institusi">
</div>

<div class="form-group col-md-6">
    <label for="">Kode Pos Institusi: <a style="color:red">(*)</a></label>
    <input type="text" name="kode_pos_institusi" class="form-control" id="kode_pos_institusi" placeholder="Masukan Kode Pos Institusi">
</div>

<div class="form-group col-md-6">
    <label for="">Email Kantor: <a style="color:red">(*)</a></label>
    <input type="text" name="email_kantor" class="form-control" id="email_kantor" placeholder="Masukan Email Kantor" placeholder="masukan email kantor">
</div>

<div class="form-group col-md-6">
    <label for="">Telephone Kantor: <a style="color:red">(*)</a></label>
    <input type="text" name="telephone_kantor" class="form-control" id="telephone_kantor" placeholder="Masukan Telephone Kantor" placeholder="masukan email kantor">
</div>

<div class="form-group col-md-6">
    <label for=""> Domisili: <a style="color:red">(*)</a></label>
    <select name="domisili" id="domisili" class="form-control">
        <option value="" disabled selected>-- pilih domisili --</option>
        <option value="lokal">Lokal</option>
        <option value="asing">Asing</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for=""> Karakteristik Perusahaan: <a style="color:red">(*)</a></label>
    <select name="karakteristik" id="karakteristik" class="form-control">
        <option value="" disabled selected>-- pilih karakteristik --</option>
        <option value="bumn">BUMN</option>
        <option value="swasta">Swasta</option>
        <option value="pma">PMA</option>
        <option value="bumd">BUMD</option>
        <option value="keluarga">Keluarga</option>
        <option value="patungan">Patungan</option>
        <option value="afiliasi">Afiliasi</option>
        <option value="lainnya">Lainnya</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for=""> Tipe Perusahaan: <a style="color:red">(*)</a></label>
    <select name="tipe_perusahaan" id="tipe_perusahaan" class="form-control">
        <option value="" disabled selected>-- pilih tipe perusahaan --</option>
        <option value="pt">Perseroan Terbatas</option>
        <option value="yayasan">Yayasan</option>
        <option value="dana_pensiun">Dana Pensiun</option>
        <option value="asuransi">Asuransi</option>
        <option value="keuangan">Lembaga Keuangan</option>
        <option value="efek">Perusahaan Efek</option>
        <option value="koperasi">Koperasi</option>
        <option value="lainnya">Lainnya</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label for="">Bidang Usaha: <a style="color:red">(*)</a></label>
    <input type="text" name="bidang_usaha" class="form-control" id="bidang_usaha"  placeholder="Masukan Bidang Usaha">
</div>

<div class="form-group col-md-6">
    <label for="">Nomor Akta Pendirian: <a style="color:red">(* hanya angka)</a></label>
    <input type="text" name="nomor_akta_pendirian" class="form-control" id="no_akta_pendirian" placeholder="Masukan Nomor Akta Pendirian">
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Akta Pendirian: <a style="color:red">(*)</a></label>
    <input type="date" name="tgl_akta_pendirian" class="form-control" id="tgl_akta_pendirian">
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Akta Perubahan Terakhir: <a style="color:red">(*)</a></label>
    <input type="date" name="tgl_akta_perubahan_terakhir" class="form-control" id="tgl_akta_perubahan_terakhir">
</div>

<div class="form-group col-md-6">
    <label for="">No Perubahan Terakhir: <a style="color:red">(* hanya angka)</a></label>
    <input type="text" name="nomor_akta_perubahan_terakhir" class="form-control" id="no_akta_perubahan_terakhir" placeholder="Masukan No Akta Prbh Terakhir">
</div>

<div class="form-group col-md-6">
    <label for="">No NPWP: <a style="color:red">(*)</a></label>
    <input type="text" name="nomor_npwp" class="form-control" id="no_npwp" placeholder="Masukan No NPWP">
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Registrasi NPWP: <a style="color:red">(*)</a></label>
    <input type="date" name="tgl_registrasi_npwp" class="form-control" id="tgl_registrasi_npwp" >
</div>

<div class="form-group col-md-6">
    <label for="">No SIUP: <a style="color:red">(*)</a></label>
    <input type="text" name="nomor_siup" class="form-control" id="no_siup" placeholder="Masukan No SIUP">
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Kadaluarsa SIUP: <a style="color:red">(*)</a></label>
    <input type="date" name="tgl_kadaluarsa_siup" class="form-control" id="tgl_kadaluarsa_siup" >
</div>

<div class="form-group col-md-6">
    <label for="">No SKDP: <a style="color:red">(*)</a></label>
    <input type="text" name="nomor_skdp" class="form-control" id="no_skdp" placeholder="Masukan No SKDP">
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Kadaluarsa SKDP: <a style="color:red">(*)</a></label>
    <input type="date" name="tgl_kadaluarsa_skdp" class="form-control" id="tgl_kadaluarsa_skdp" >
</div>

<div class="form-group col-md-6">
    <label for="">No TDP: <a style="color:red">(*)</a></label>
    <input type="text" name="nomor_tdp" class="form-control" id="no_tdp" placeholder="Masukan No TDP">
</div>

<div class="form-group col-md-6">
    <label for="">Tanggal Kadaluarsa TDP: <a style="color:red">(*)</a></label>
    <input type="date" name="tgl_kadaluarsa_tdp" class="form-control" id="tgl_kadaluarsa_tdp" >
</div>

<div class="form-group col-md-6">
    <label for="">No Izin PMA: <a style="color:red">(*)</a></label>
    <input type="date" name="nomor_izin_pma" class="form-control" id="no_izin_pma" placeholder="Masukan No Izin PMA">
</div>