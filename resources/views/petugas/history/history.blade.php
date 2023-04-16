@extends('layouts.petugas.master')

@section('title')
    History
@endsection

@section('pages')
    <a href="{{ route('history.index') }}">History</a>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Data History Penawaran Lelang {{ $lelang->barang->nama_barang }}</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-stiped table-bordered table-penjualan">
                            <thead class="text-center">
                                <th width="5%">No</th>
                                <th>User</th>
                                <th>Penawaran harga</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($history as $item)
                                <tr class="text-center">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->user->nama_lengkap }}</td>
                                    <td>Rp. {{ number_format($item->penawaran_harga) }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-sm">Tidak Ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush