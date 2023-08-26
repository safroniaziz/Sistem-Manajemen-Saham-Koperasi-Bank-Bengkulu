@extends('layouts.app')
@section('subTitle','Data Saham Institusi')
@section('page','Data Saham Institusi')
@section('subPage','Semua Data')
@section('user-login')
     {{ Auth::user()->name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i>&nbsp;Tambah Saham Institusi</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('sahamInstitusi.update') }}" method="POST" id="form">
                    {{ csrf_field() }} {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="">Nama Investor</label>
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="institusi_id" value="{{ $data->institusi->id }}">
                                <input type="text" value="{{ $data->institusi->nama_investor }}" class="form-control" readonly>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">Nama Institusi</label>
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="text" value="{{ $data->institusi->nama_institusi }}" class="form-control" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK3S:</label>
                                <input type="text" name="no_sk3s" value="{{ $data->nomor_sk3s }}" class="form-control" id="no_sk3s" placeholder="Masukan Nomor SK3S" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Seri SPMPKOP</label>
                                <input type="text" name="seri_spmpkop" value="{{ $data->seri_spmpkop }}" class="form-control" id="seri_spmpkop" placeholder="Masukan nomor register" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Seri Formulir</label>
                                <input type="text" name="seri_formulir" value="{{ $data->seri_formulir }}" class="form-control" id="seri_formulir" placeholder="Masukan nomor register" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Saham</label>
                                <input type="number" name="jumlah_saham" value="{{ $data->jumlah_saham }}" class="form-control" id="jumlah_saham" placeholder="Masukan Jumlah Saham" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Terbilang Saham</label>
                                <input type="text" name="terbilang_saham" value="{{ $data->terbilang_saham }}" class="form-control" id="terbilang_saham" required placeholder="Masukan Terbilang Saham">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Lembar</label>
                                <input type="number" name="jumlah_lembar" value="{{ $data->jumlah_lembar }}" class="form-control" id="jumlah_lembar" required placeholder="Masukan Jumlah Lembar">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Saham</label>
                                <input type="text" name="nomor_saham" value="{{ $data->nomor_saham }}" class="form-control" id="nomor_saham" required placeholder="Masukan Nomor Saham">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Ditetapkan</label>
                                <input type="date" name="tanggal_ditetapkan" value="{{ $data->tanggal_ditetapkan }}" class="form-control" id="tanggal_ditetapkan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Mata Uang</label>
                                <select name="jenis_mata_uang" class="form-control" id="jenis_mata_uang" required>
                                    <option value="" selected disabled>-- pilih mata uang --</option>
                                    <option {{ $data->jenis_mata_uang == "idr" ? 'selected' : ''}} value="idr">IDR</option>
                                    <option {{ $data->jenis_mata_uang == "usd" ? 'selected' : ''}} value="usd">USD</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Rekening</label>
                                <input type="text" name="pembayaran_no_rek" value="{{ $data->pembayaran_no_rek }}" class="form-control" id="pembayaran_no_rek" required placeholder="Masukan Nomor Rekening">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Rekening</label>
                                <input type="text" name="pembayaran_nm_rek" value="{{ $data->pembayaran_nm_rek }}" class="form-control" id="pembayaran_nm_rek" required placeholder="Masukan Nama Pemilik Rekening">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Bank</label>
                                <input type="text" name="pembayaran_nm_bank" value="{{ $data->pembayaran_nm_bank }}" class="form-control" id="pembayaran_nm_bank" required placeholder="Masukan Nama Bank">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-12" style="text-align: center">
                            <a href="{{ route('sahamInstitusi') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Simpan Saham Institusi</button>
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
                    } , 500);
                },
                error:function(xhr){
                    toastr.error(xhr.responseJSON.text, 'Ooopps, Ada Kesalahan');
                }
            })
        });
    </script>
    <script src="{{ asset('assets/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
    <script>
        $(".selectInvestor").select2({
            minimumInputLength: 3,
            allowClear: true,
            placeholder: 'Masukan Nama Investor/Institusi',
            ajax: {
                type: 'get',
                dataType: 'json',
                url: '{{ route("sahamInstitusi.cari_institusi") }}',
                data: function(params) {
                    return {
                        keyword: params.term
                    }
                },
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.nama_investor,
                                id: item.id
                            }
                        })
                    };
                },
            },
        });

        $('#institusi_id').on('select2:select', function (e) {
            console.log(e.params.data.text);
            $("#institusi").val(e.params.data.text);
        });
    </script>
@endpush
