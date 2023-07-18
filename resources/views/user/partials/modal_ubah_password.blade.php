<div class="modal fade" id="modalubahpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="font-size:15px;" class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>&nbsp;Form Ubah Password User
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h4>
            </div>
            <form action=" {{ route('user.ubah_password') }} " method="POST" enctype="multipart/form-data" id="form-ubah-password">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_password">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Login</label>
                        <input type="password" name="password" id="password_ubah" class="form-control" placeholder="********" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ulangi Password Login</label>
                        <input type="password" name="ulangi_password" id="ulangi_password"  class="form-control" placeholder="********" required>
                    </div>
                    <div class="alert alert-success" id="konfirmasi" style="display:none;">
                        
                        <i class="fa fa-check-circle"></i>&nbsp;<strong style="font-style:italic;">Password Sama !</strong>
                    </div>
                    <div class="alert alert-danger" id="konfirmasi-gagal" style="display:none;">
                        
                        <i class="fa fa-close"></i>&nbsp;<strong style="font-style:italic;">Password Tidak Sama !</strong>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Batalkan</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-flat" id="btn-submit" disabled><i class="fa fa-check-circle"></i>&nbsp;Simpan Perubahan Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).on('submit','#form-ubah-password',function (event){
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
@endpush
