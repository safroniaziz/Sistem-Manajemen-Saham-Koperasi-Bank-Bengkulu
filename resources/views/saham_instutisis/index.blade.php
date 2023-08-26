@extends('layouts.app')
@section('subTitle','Data Saham Investor')
@section('page','Data Saham Investor')
@section('subPage','Semua Data')
@section('user-login')
    {{ Auth::user()->name }}@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-chart-line"></i>&nbsp;Manajemen Saham Investor</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('sahamInstitusi.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <div class="row">
                    <form method="GET">
                        <div class="form-group col-md-12" style="margin-bottom: 5px !important;">
                            <label for="nama" class="col-form-label">Cari Nama Investor</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Investor/Nama Institusi..." value="{{$nama}}">
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px !important;">
                            <button type="submit" class="btn btn-success btn-sm btn-flat mb-2"><i class="fa fa-search"></i>&nbsp;Cari Data</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <p>Jumlah Data Keseluruhan : {{ $sahamInstitusis->total() }} Data</p>
                    <table class="table table-bordered table-hover investor">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Investor</th>
                                <th>Nama Institusi</th>
                                <th>Jumlah Saham</th>
                                <th>Terbilang Saham</th>
                                <th>Status Saham</th>
                                <th style="vertical-align: middle"> Ditetapkan</th>
                                <th style="vertical-align: middle" class="text-center">Cetak</th>
                                <th style="vertical-align: middle" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach($sahamInstitusis as $saham)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $saham->institusi->nama_investor }} </td>
                                    <td> {{ $saham->institusi->nama_institusi }} </td>
                                    <td> {{ number_format($saham->jumlah_saham) }} </td>
                                    <td> {{ $saham->terbilang_saham }} </td>
                                    <td>
                                        @if($saham->nomor_sk3s_lama == NULL)
                                            <p class="text-success">saham pembelian baru</p>
                                            @else
                                                <p class="text-warning">saham pengalihan</p>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $saham->tanggal_ditetapkan }}
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('sahamInstitusi.cetak_sk3s',[$saham->id]) }}" target="_blank" class="btn btn-success btn-sm btn-flat"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak SK3S</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('sahamInstitusi.cetak_spmpkop',[$saham->id]) }}" target="_blank" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak SPMPKOP</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('sahamInstitusi.edit',[$saham->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('sahamInstitusi.alihkan',[$saham->id]) }}" class="btn btn-info btn-sm btn-flat"><i class="fa fa-exchange"></i>&nbsp; Alihkan</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('sahamInstitusi.delete',[$saham->id]) }}" method="POST" >
                                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$sahamInstitusis->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
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
                    } , 500);
                },
                error:function(xhr){
                    toastr.error(xhr.responseJSON.text, 'Ooopps, Ada Kesalahan');
                }
            })
        });

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Apakah Anda Yakin?`,
                text: "Harap untuk memeriksa kembali sebelum menghapus data.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    </script>
@endpush
