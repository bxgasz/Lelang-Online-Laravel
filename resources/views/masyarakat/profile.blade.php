@extends('layouts.masyarakat.master')

@section('title')
    profile
@endsection

@push('css')
<style>
    .forms{
        border-radius: 0;
        box-shadow: none;
        font-size: 14px;
        border-radius: 0;
    }

    .forms:focus{
        box-shadow: none;
        border-color: #4154f1;
    }
</style>
@endpush

@section('content')
<section class="mt-5">
    <div class="container">
        <div class="form-profile">
            <form action="{{ route('masy.profile.update') }}" method="post" data-toggle="validator" enctype="multipart/form-data" class="form-profil">
                @csrf
                <div class="box-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-lg-4 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-8">
                            <input type="text" name="name" id="name" class="form-control forms" required value="{{ $profil->nama_lengkap }}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-lg-4 col-lg-offset-1 control-label">Email</label>
                        <div class="col-lg-8">
                            <input type="text" name="email" id="email" class="form-control forms" required value="{{ $profil->email }}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-lg-4 col-lg-offset-1 control-label">Username</label>
                        <div class="col-lg-8">
                            <input type="text" name="username" id="username" class="form-control forms" required value="{{ $profil->username }}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    {{-- <div class="mb-3 row">
                        <label for="foto" class="col-lg-2 col-lg-offset-1 control-label">Profile</label>
                        <div class="col-lg-4">
                            <input type="file" name="foto" id="foto" class="form-control forms" 
                            onchange="preview('.tampil_foto', this.files[0])">
                            <span class="help-block with-errors"></span>
                            <br>
                            <div class="tampil_foto"><img src="{{ url($profil->foto ?? '/') }}" width="200"></div>
                        </div>
                    </div> --}}
                    <div class="mb-3 row">
                        <label for="old_password" class="col-lg-4 col-lg-offset-1 control-label">Passoword Lama</label>
                        <div class="col-lg-8">
                          <input type="text" name="old_password" id="old_password" class="form-control forms" minlength="6">
                          <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-lg-4 col-lg-offset-1 control-label">Passoword</label>
                        <div class="col-lg-8">
                          <input type="text" name="password" id="password" class="form-control forms" minlength="6">
                          <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-lg-4 col-lg-offset-1 control-label">Konfirmasi Password</label>
                        <div class="col-lg-8">
                          <input type="text" name="password_confirmation" id="password_confirmation" class="form-control forms" data-match="#password">
                          <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="submit" class="btn btn-sm btn-flat btn-primary float-end"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#old_password').on('keyup', function(){
            if ($(this).val() != "") {
                $('#password, #password-confirmation').attr('required', true);
            } else {
                $('#password, #password-confirmation').attr('required', false);
            }
        })

        $('.form-profil').on('submit', function (e){
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('.form-profil').attr('action'),
                    type: $('.form-profil').attr('method'),
                    data: new FormData($('.form-profil')[0]),
                    async: false,
                    processData: false,
                    contentType: false
                })
                .done(response => {
                    $('[name=name]').val(response.nama_lengkap);
                    $('[name=email]').val(response.email);
                    $('[name=username]').val(response.username);
                    $('[name=old_password]').val('');
                    $('[name=password]').val('');
                    $('[name=password_confirmation]').val('');

                    toastr.success('Berhasil!!', 'Berhasil update profile!', {timeOut: 1500})
                })
                .fail(errors => {
                    if (errors.status == 422) {
                        toastr.error('Gagal!!', errors.responseJSON, {timeOut: 1500})
                    }
                    else {
                        toastr.error('Gagal!!', 'Tidak Dapat mengubah Data!', {timeOut: 1500})
                    }
                    return;
                })
            }
        });
    });
</script>
@endpush