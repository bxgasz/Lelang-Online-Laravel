@extends('layouts.petugas.master')

@section('title')
    profile
@endsection

@section('pages')
    profile
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Profile</h6>
                    </div>
                </div>
                <form action="{{ route('petugas.profile.update') }}" class="form-profil" method="post" data-toggle="validator">
                    @csrf
                    <div class="card-body pb-2">
                        <div class="input-group input-group-static mb-4">
                            <label>Nama Petugas</label>
                            <input type="text" class="form-control" required name="nama_petugas" value="{{ $profil->nama_petugas }}">
                        </div> 
                        <div class="input-group input-group-static mb-4">
                            <label>Username</label>
                            <input type="text" class="form-control" required name="username" value="{{ $profil->username }}">
                        </div> 
                        <div class="input-group input-group-static mb-4">
                            <label>Email Petugas</label>
                            <input type="text" class="form-control" required name="email" value="{{ $profil->email }}">
                        </div> 
                        <div class="input-group input-group-static mb-4">
                            <label>Password Lama</label>
                            <input type="text" class="form-control" name="old_password">
                        </div> 
                        <div class="input-group input-group-static mb-4">
                            <label>Password Baru</label>
                            <input type="text" class="form-control" name="password">
                        </div> 
                        <div class="input-group input-group-static mb-4">
                            <label>Konfirmasi Password</label>
                            <input type="text" class="form-control" name="password_confirmation">
                        </div> 
                    </div>
                    <div class="card-footer float-end">
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                        <a href="{{ url()->previous() }}" class="btn btn-link  ml-auto">Close</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                    $('[name=nama_petugas]').val(response.nama_petugas);
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