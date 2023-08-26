@extends('layouts.app')
@section('subTitle','Data Institusi')
@section('page','Data Institusi')
@section('subPage','Semua Data')
@section('user-login')
     {{ Auth::user()->name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i>&nbsp;Edit Data Institusi</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('institusi.update',[$institusi->id]) }}" method="POST" id="form">
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">1. LENGKAPI DATA INVESTOR INSTITUSI</h4>
                                </div>
                            </div>
                            @include('institusi.partials_edit.data')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">2. LENGKAPI DATA PEMEGANG SAHAM</h4>
                                </div>
                            </div>
                            @include('institusi.partials_edit.pemegang_saham')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">3. LENGKAPI DATA PENERIMA KUASA</h4>
                                </div>
                            </div>
                            @include('institusi.partials_edit.penerima_kuasa')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">4. LENGKAPI DATA KEUANGAN</h4>
                                </div>
                            </div>
                            @include('institusi.partials_edit.data_keuangan')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">5. LENGKAPI DATA INSTRUKSI PEMBAYARAN</h4>
                                </div>
                            </div>
                            @include('institusi.partials_edit.instruksi_pembayaran')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">6. LENGKAPI DOKUMEN PENDUKUNG</h4>
                                </div>
                            </div>
                            @include('institusi.partials_edit.dokumen_pendukung')
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-12" style="text-align: center">
                            <a href="{{ route('institusi') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data Investor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('submit','#form',function (event){
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
