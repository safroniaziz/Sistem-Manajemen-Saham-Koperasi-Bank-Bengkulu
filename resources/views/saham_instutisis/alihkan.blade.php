@extends('layouts.app')
@section('subTitle','Data Saham Investor')
@section('page','Data Saham Investor')
@section('subPage','Semua Data')
@section('user-login')
     {{ Auth::user()->name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-exchange"></i>&nbsp;Alihkan Saham Investor</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('sahamInstitusi.alihkan_post',[$data->id]) }}" method="POST" id="form">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="">Pilih Investor</label>
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="investor_id" value="{{ $data->institusi->id }}">
                                <input type="text" value="{{ $data->institusi->nama_investor }}" class="form-control" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK3S Lama</label>
                                <input type="text" name="no_sk3s_lama" value="{{ $data->nomor_sk3s }}" class="form-control" id="no_sk3s">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pilih Investor Pembeli</label>
                                <input type="hidden" name="institusi_pembeli" id="institusi_pembeli">
                                <select name="institusi_pembeli_id" class="form-control selectInvestor" id="institusi_pembeli_id" style="width: 100%">
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK3S Baru:</label>
                                <input type="text" name="no_sk3s" class="form-control" id="no_sk3s">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Seri SPMPKOP</label>
                                <input type="text" name="seri_spmpkop" value="{{ $data->seri_spmpkop }}" class="form-control" id="seri_spmpkop">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Seri Formulir</label>
                                <input type="text" name="seri_formulir" value="{{ $data->seri_formulir }}" class="form-control" id="seri_formulir">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Saham</label>
                                <input type="text" name="jumlah_saham" value="{{ $data->jumlah_saham }}" class="form-control" id="jumlah_saham">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Saham Terbilang</label>
                                <input type="text" name="jumlah_saham_terbilang" value="{{ $data->terbilang_saham }}" class="form-control" id="terbilang_saham">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Mata Uang</label>
                                <select name="jenis_mata_uang" class="form-control" id="jenis_mata_uang">
                                    <option value="" selected disabled>-- pilih mata uang --</option>
                                    <option {{ $data->jenis_mata_uang == "idr" ? 'selected' : '' }} value="idr">IDR</option>
                                    <option {{ $data->jenis_mata_uang == "usd" ? 'selected' : '' }} value="usd">USD</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Rekening</label>
                                <input type="text" name="pembayaran_nomor_rekening" value="{{ $data->pembayaran_no_rek }}" class="form-control" id="pembayaran_no_rekening" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Rekening</label>
                                <input type="text" name="pembayaran_nama_rekening" value="{{ $data->pembayaran_nm_rek }}" class="form-control" id="pembayaran_nm_rekening" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Bank</label>
                                <input type="text" name="pembayaran_nama_bank" value="{{ $data->pembayaran_nm_bank }}" class="form-control" id="pembayaran_nm_bank" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Lembar</label>
                                <input type="number" name="jumlah_lembar" value="{{ $data->jumlah_lembar }}" class="form-control" id="jumlah_lembar">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Saham</label>
                                <input type="text" name="nomor_saham" value="{{ $data->nomor_saham }}" class="form-control" id="nomor_saham" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Ditetapkan</label>
                                <input type="date" name="tanggal_ditetapkan" value="{{ $data->tanggal_ditetapkan }}" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pengalihan Saham Ke-</label>
                                <select name="perubahan_ke" class="form-control" id="">
                                    <option value="" disabled selected>-- pengalihan ke --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-12" style="text-align: center">
                            <a href="{{ route('sahamInstitusi') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Simpan Saham Investor</button>
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

    $('#institusi_pembeli_id').on('select2:select', function (e) {
        console.log(e.params.data.text);
        $("#institusi_pembeli").val(e.params.data.text);
    });
</script>
@endpush
