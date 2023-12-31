@extends('layouts.app')
@section('subTitle','Data Investor')
@section('page','Data Investor')
@section('subPage','Semua Data')
@section('user-login')
     {{ Auth::user()->name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-calendar"></i>&nbsp;Tambah Data Investor</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form action="">
                            <div class="form-group col-md-6">
                                <label for="">Pilih Nama Investor</label>
                                <input type="text" name="nama_investor" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Status Perkawinan</label>
                                <select name="status_perkawinan" class="form-control" id="">
                                    <option disabled selected>-- pilih status perkawinan --</option>
                                    <option value="menikah">Menikah</option>
                                    <option value="belum_menikah">Belum Menikah</option>
                                    <option value="janda/duda">Janda/Duda</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Kewarganegaraan</label>
                                <select name="status_perkawinan" class="form-control" id="">
                                    <option disabled selected>-- pilih Kewarganegaraan --</option>
                                    <option value="wni">Warga Negara Indonesia</option>
                                    <option value="wna">Warga Negara Asing</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jenis Rekening</label>
                                <select name="status_perkawinan" class="form-control" id="">
                                    <option disabled selected>-- pilih enis Rekening --</option>
                                    <option value="perorangan">Perorangan</option>
                                    <option value="nonperorangan">Nonperorangan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Profil Resiko Nasaba</label>
                                <input type="text" name="profil_resiko_nasabah" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nomor KTP</label>
                                <input type="text" name="nomor_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Kadaluarsa KTP</label>
                                <input type="date" name="tanggal_kadaluarsa_ktp" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Registrasi Npwp</label>
                                <input type="date" name="tanggal_registrasi_npwp" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('submit','#form-hapus',function (event){
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                typeData: "JSON",
                data: new FormData(this),
                processData:false,
                contentType:false,
                success : function(res) {
                    $("#btnSubmit"). attr("disabled", true);
                    toastr.success(res.text, 'Yeay, Berhasil');
                    setTimeout(function () {
                        window.location.href=res.url;
                    } , 100);
                },
                error:function(xhr){
                    toastr.error(xhr.responseJSON.text, 'Ooopps, Ada Kesalahan');
                }
            })
        });
    </script>
@endpush
