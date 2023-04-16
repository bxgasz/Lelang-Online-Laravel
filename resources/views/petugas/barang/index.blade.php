@extends('layouts.petugas.master')

@section('title')
    barang
@endsection

@section('pages')
    barang
@endsection

@push('css')
<style>
    .modal-img{
        width: 100%;
    }

    .invalid-feedback{
        display: block;
    }

    .loader{
        margin: 0 0 2em;
        height: 100px;
        width: 20%;
        text-align: center;
        padding: 1em;
        margin: 0 auto 1em;
        vertical-align: top;
        }

        /*
        Set the color of the icon
        */
    svg path,
    svg rect{
        fill: #d63384;
    }

    .clicked {
        opacity: 0.5;
    }

    .btn-del{
        margin-bottom: -85px;
        margin-left: 10px;
    }
</style>
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Data Barang</h6>
                    </div>
                    <button class="btn btn-block bg-gradient-info mt-3" data-bs-toggle="modal" data-bs-target="#modal-barang">Tambah Data</button>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive p-0">
                        <div id="read"></div>
                    </div>
                    @livewire('barang.barang')
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    window.addEventListener('close-modal', function () {
        $('#modal-barang').modal('hide');
        $('#modal-barangupdate').modal('hide');
    })

    window.addEventListener('success', function () {
        toastr.success('Berhasil!!', 'Berhasil menambahkan data!', {timeOut: 1500})
        read()
    })

    window.addEventListener('errors', function () {
        toastr.error('Gagal!!', 'Gagal menambahkan data!', {timeOut: 1500})
        read()
    })

    let table;
    $(document).ready(function() {
        read()
        $(document).on('change', '#status', function () {
            let id = $(this).data('id');
            let status = $(this).val();

            $.post(`{{ url('barang-status') }}/${id}`, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'put',
                    'status': status
                })
                .done((response) => {
                    toastr.success('Berhasil!!', 'Berhasil mengubah status!', {timeOut: 1500})
                    read();
                })
                .fail((errors) => {
                    toastr.error('Gagal!!', 'Gagal mengubah status!', {timeOut: 1500})
                    return;
                });
        });

        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            barang(page)
        })
    })

    function barang(page){
        $.ajax({
            url: '/barang-paginate?page='+page,
            success:function(res){
                $('#read').html(res);
            }
        })
    }

    function read(){
        $.get("{{ route('barang.data') }}", function(data,status){
            $('#read').html(data);
        })
    }

    function editData(id){
       Livewire.emit('editData',id);
    }

    function deleteImage(element){
        Livewire.emit('delImage', $(element).attr('data-id'));
        let id = $(element).attr('data-id');
        let img = $('#'+id);
        console.log(img)
        if(img){
            img.addClass('clicked');
        }
    }

    function deleteData(url){
        Swal.fire({
            title: 'Yakin?',
            text: 'Apakah Anda igin menghapus Data terpilih??',
            icon: 'warning',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
            customClass: {
                actions: 'my-actions',
                cancelButton: 'order-1 right-gap',
                confirmButton: 'order-2',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    read();
                    toastr.success('Berhasil!!', 'Berhasil mengahpus data!', {timeOut: 1500})
                })
                .fail((errors) => {
                    toastr.error('Gagal!!', 'Tidak dapat menghapus Data!', {timeOut: 1500})
                    return;
                })
            }
        })
    }
</script>
@endpush

