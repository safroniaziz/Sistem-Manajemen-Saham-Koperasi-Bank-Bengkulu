@extends('layouts.app')
@section('subTitle','Data Investor')
@section('page','Data Investor')
@section('subPage','Semua Data')
@section('user-login')
    {{ Auth::user()->name }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-university"></i>&nbsp;Manajemen Data Institusi</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('institusi.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form method="GET">
                        <div class="form-group col-md-12" style="margin-bottom: 5px !important;">
                            <label for="nama" class="col-form-label">Cari Nama Investor/iNstitusi</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Investor/Institusi..." value="{{$nama}}">
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px !important;">
                            <button type="submit" class="btn btn-success btn-sm btn-flat mb-2"><i class="fa fa-search"></i>&nbsp;Cari Data</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <p>Jumlah Data Keseluruhan : {{ $institusis->total() }} Data</p>
                    <table class="table table-bordered table-hover institusi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Investor</th>
                                <th>Nama Institusi</th>
                                <th>Karakteristik</th>
                                <th>Nomor Akta Pendirian</th>
                                <th>Nomor Register</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach($institusis as $institusi)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $institusi->nama_investor }} </td>
                                    <td> {{ $institusi->nama_institusi }} </td>
                                    <td> {{ $institusi->karakteristik }} </td>
                                    <td> {{ $institusi->nomor_akta_pendirian }} </td>
                                    <td> {{ $institusi->nomor_register }} </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('institusi.edit',[$institusi->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('institusi.delete',[$institusi->id]) }}" method="POST" id="form-hapus">
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
                    {{$institusis->links("pagination::bootstrap-4") }}
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
