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
                <form action="{{ route('investor.store') }}" method="POST" id="form">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">1. LENGKAPI DATA INVESTOR</h4>
                                </div>
                            </div>
                            @include('investor.partials_create.data')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">2. LENGKAPI IDENTITAS INVESTOR</h4>
                                </div>
                            </div>
                            @include('investor.partials_create.identitas')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">3. LENGKAPI DATA KORESPONDENSI INVESTOR</h4>
                                </div>
                            </div>
                            @include('investor.partials_create.korespondensi')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">4. LENGKAPI DATA PASANGAN/ORANG TUA INVESTOR</h4>
                                </div>
                            </div>
                            @include('investor.partials_create.pasangan_orang_tua')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">5. LENGKAPI DATA PEKERJAAN INVESTOR</h4>
                                </div>
                            </div>
                            @include('investor.partials_create.pekerjaan')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">6. LENGKAPI DOKUMEN PENDUKUNG INVESTOR</h4>
                                </div>
                            </div>
                            @include('investor.partials_create.dokumen_pendukung')
                            <div class="col-md-12">
                                <div class="callout callout-info text-center">
                                    <h4 style="margin-bottom: 0px !important;">7. LENGKAPI PERSETUJUAN INVESTOR</h4>
                                </div>
                            </div>
                            @include('investor.partials_create.persetujuan')
                            
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-12" style="text-align: center">
                            <a href="{{ route('investor') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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

        // validasi data sama
        $(document).ready(function(){
            $("#alamat_ktp").keyup(function(){
                var alamat = $("#alamat_ktp").val();
                $('#alamat_tempat_tinggal').val(alamat);
                $('#alamat_surat_menyurat_ktp').val(alamat);
                $('#alamat_tempat_tinggal_pasangan_atau_orang_tua').val(alamat);
            });
        });

        //validasi pekerjaan
        $(document).ready(function(){
            $("#nama_pekerjaan").change(function(){
                var sumber = $("#nama_pekerjaan").val();
                if((sumber == 'tidak_bekerja') ){
                    $('#info-pekerjaan :input').prop('disabled',true);
                }
                else{
                    $('#info-pekerjaan :input').prop('disabled',false);
                }
            });
        });

        //validasi pekerjaan pasangan
        $(document).ready(function(){
            $("#pekerjaan_pasangan").change(function(){
                var sumber = $("#pekerjaan_pasangan").val();
                if((sumber == 'tidak_bekerja') ){
                    $('#pekerjaan-pasangan :input').prop('disabled',true);
                }
                else{
                    $('#pekerjaan-pasangan :input').prop('disabled',false);
                }
            });
        });

        $(document).ready(function(){
            $("#rt_ktp").keyup(function(){
                var alamat = $("#rt_ktp").val();
                $('#rt_tempat_tinggal').val(alamat);
            });
        });

        $(document).ready(function(){
            $("#rw_ktp").keyup(function(){
                var alamat = $("#rw_ktp").val();
                $('#rw_tempat_tinggal').val(alamat);
            });
        });

        $(document).ready(function(){
            $("#kelurahan_ktp").keyup(function(){
                var alamat = $("#kelurahan_ktp").val();
                $('#kelurahan_tempat_tinggal').val(alamat);
            });
        });

        $(document).ready(function(){
            $("#kecamatan_ktp").keyup(function(){
                var alamat = $("#kecamatan_ktp").val();
                $('#kecamatan_tempat_tinggal').val(alamat);
            });
        });

        $(document).ready(function(){
            $("#kota_ktp").keyup(function(){
                var alamat = $("#kota_ktp").val();
                $('#kota_tempat_tinggal').val(alamat);
            });
        });

        $(document).ready(function(){
            $("#provinsi_ktp").keyup(function(){
                var alamat = $("#provinsi_ktp").val();
                $('#provinsi_tempat_tinggal').val(alamat);
            });
        });

        $(document).ready(function(){
            $("#kode_pos_ktp").keyup(function(){
                var alamat = $("#kode_pos_ktp").val();
                $('#kode_pos_tempat_tinggal').val(alamat);
            });
        });
    </script>
@endpush
