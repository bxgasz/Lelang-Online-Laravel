@extends('layouts.petugas.master')

@section('title')
    History
@endsection

@section('pages')
    History
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Data History pe-Lelangan</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-stiped table-bordered table-penjualan">
                            <thead class="text-center">
                                <th width="5%">No</th>
                                <th>Tanggal lelang</th>
                                <th>Nama Barang</th>
                                <th>Pemenang</th>
                                <th>Harga Akhir</th>
                                <th width="15%"><i class="fa fa-cog"></i></th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($data as $item)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->tgl_lelang }}</td>
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>Rp. {{ number_format($item->harga_akhir) }}</td>
                                    <td>
                                        <a href="{{ route('history.show', $item->id_lelang) }}"><button class="btn btn-xs btn-info" id="status"><i class="fa fa-eye"></i></button></a>
                                        <a href="{{ route('send.email', $item->id_lelang) }}"><button class="btn btn-xs btn-warning" id="status"><i class="fa fa-envelope"></i></button></a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-sm">Tidak Ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    let msg = '{{ Session::get('msg') }}';
    let exist = '{{ Session::has('msg') }}';
    $(function(){
        if (exist) {
            toastr.success('Berhasil!!', msg, {timeOut: 1500})
        }
    })
</script>
@endpush

