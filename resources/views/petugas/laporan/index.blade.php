@extends('layouts.petugas.master')

@section('title')
    laporan
@endsection

@section('pages')
    laporan
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Laporan Pendapatan</h6>
                    </div>
                    <button onclick="ubahTanggal()" class="btn btn-block bg-gradient-info mt-3"><i class="fa fa-plus-circle"></i> Ubah periode</button>
                    <a href="{{ route('laporan.pdf', [$tanggalAwal,$tanggalAkhir]) }}" target="blank" class="btn btn-success btn-block mt-3"><i class="fa fa-file-pdf"></i> Cetak PDF</a>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive p-0">
                        <div id="read"></div>
                    </div>
                    @includeIf('petugas.laporan.form')
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    $(function(){
        read()
    })

    function read(){
        $.get("{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir]) }}", function(data,status){
            $('#read').html(data);
        })
    }

    function ubahTanggal()
    {
        $('#modal-tanggal').modal('show');
    }
</script>
@endpush