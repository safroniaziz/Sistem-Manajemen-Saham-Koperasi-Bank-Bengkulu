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
                <h3 class="box-title"><i class="fa fa-investors"></i>&nbsp;Manajemen Data Investor</h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('investor.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form method="GET">
                        <div class="form-group col-md-12" style="margin-bottom: 5px !important;">
                            <label for="nama" class="col-form-label">Cari Nama Investor</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Investor..." value="{{$nama}}">
                        </div>
                        <div class="col-md-12" style="margin-bottom:10px !important;">
                            <button type="submit" class="btn btn-success btn-sm btn-flat mb-2"><i class="fa fa-search"></i>&nbsp;Cari Data</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <p>Jumlah Data Keseluruhan : {{ $investors->total() }} Data</p>
                    <table class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Register</th>
                                <th>Nama Investor</th>
                                <th>Nama Ahli Waris</th>
                                <th>No. KTP</th>
                                <th>Terdaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $startIndex = ($investors->currentPage() - 1) * $investors->perPage();
                            @endphp
    
                            @foreach($investors as $index => $investor)
                                <tr>
                                    <td> {{ $startIndex + $index + 1 }} </td>
                                    <td>
                                        <a href="">{{ $investor->nama_investor }}</a>
                                        <hr class="thin-hr">
                                        <span class="label label-success">{{ $investor->jenis_kelamin == "L" ? 'Laki-Laki' : 'Perempuan' }} </span>&nbsp;   
                                        <span class="label label-info">{{ $investor->jenis_rekening }}</span>&nbsp;
                                        <span class="label label-warning">{{ $investor->status_perkawinan == "menikah" ? 'Menikah' : 'Belum Menikah' }} </span>
    
                                    </td>
                                    <td>
                                        {{ $investor->nomor_register }}
                                    </td>
                                    <td> {{ $investor->nama_ahli_waris ? $investor->nama_ahli_waris : '-' }} </td>
                                    <td> {{ $investor->nomor_ktp }} </td>
                                    <td>
                                        {{ $investor->created_at->isoFormat('DD MMMM YYYY') }}
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                {{-- <td>
                                                    <a href="{{ route('investor.cetak_perorangan',[$investor->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak</a>
                                                </td> --}}
                                                <td>
                                                    <a href="{{ route('investor.edit',[$investor->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('investor.delete',[$investor->id]) }}" method="POST" id="form-hapus">
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
                    {{$investors->links("pagination::bootstrap-4") }}
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
