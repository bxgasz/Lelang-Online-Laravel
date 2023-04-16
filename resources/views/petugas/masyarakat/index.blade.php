@extends('layouts.petugas.master')

@section('title')
    Masyarakat
@endsection

@section('pages')
    Masyarakat
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Data Masyarakat</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive p-0">
                        <div id="read"></div>
                    </div>
                    @includeIf('petugas.user.form')
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    let table;
    $(document).ready(function() {
        read()
        $('#modal-form').validator().on('submit', function(e) {
            if (!e.preventDefault()){
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                .done((response) => {
                    $('#modal-form').modal('hide');
                    toastr.success('Berhasil!!', 'Data telah disimpan!', {timeOut: 1500})
                    read();
                })
                .fail((errors) => {
                    toastr.error('Gagal!!', 'Tidak dapat menyimpan Data!', {timeOut: 1500})
                    return;
                });
            }
        });

        $(document).on('click', '.pagination a', function(e){
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            data(page)
        })
    })

    function data(page){
        $.ajax({
            url: '/masyarakat-paginate?page='+page,
            success:function(res){
                $('#read').html(res);
            }
        })
    }

    function read(){
        $.get("{{ route('masyarakat.data') }}", function(data,status){
            $('#read').html(data);
        })
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

