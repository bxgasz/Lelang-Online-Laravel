@extends('layouts.masyarakat.master')

@section('title')
    riwayat
@endsection

@section('content')
<section class="mt-5">
    <div class="container">
        <div class="row">
            <table class="table text-center table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lelang</th>
                        <th>Tanggal Lelang</th>
                        <th>Status</th>
                        <th>Penawaran</th>
                        <th>Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($history as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->barang->nama_barang }}</td>
                            <td>{{ $item->lelang->tgl_lelang }}</td>
                            <td>{{ $item->lelang->status }}</td>
                            <td>Rp. {{ number_format($item->penawaran_harga) }}</td>
                            <td>{{ $item->user->username }}</td>
                            {{-- <td><button type="button" onclick="showDetail('{{ route('masy.showdetail', $item->id_lelang) }}')" class="btn btn-primary"><i class="bi bi-eye"></i></button></td> --}}
                            <td><a href="{{ route('masy.show', $item->id_lelang) }}"><button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Belum mengikuti pelelangan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Detail Lelang</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="title"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        {{-- end modal --}}
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(function () {
        
    });

    function showDetail(url){
        $.get(url, function(data){
            $('#modal-detail').modal('show');
            $('#title').text(data.id_lelang);
        })
    }
</script>
@endpush