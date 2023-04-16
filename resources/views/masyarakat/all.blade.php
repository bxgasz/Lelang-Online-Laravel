@extends('layouts.masyarakat.master')

@section('title')
    riwayat
@endsection

@section('content')
<section class="mt-5">
    <div class="container">
        <div class="row">
            @forelse ($lelang as $item)    
              <div class="col-lg-6 col-md-12">
                  <a href="{{ route('masy.show',$item->id_lelang) }}">
                      <div class="card mb-3"  style="max-width: 540px;">
                          <div class="row g-0">
                          <div class="col-md-4">
                              <img src="{{ asset('storage/'.$item->image->image) }}" class="img-fluid rounded-4 p-2">
                          </div>
                          <div class="col-md-7">
                              <div class="card-body">
                              <h5 class="card-title fw-bold">{{ $item->barang->nama_barang }}</h5>
                              <p class="card-text"><small class="text-muted">{{ $item->tgl_lelang }}</small></p>
                              <h5 class="fw-bold text-blue">Rp. {{ number_format($item->barang->harga_awal) }}</h5>
                              <p class="card-text ">{{ $item->barang->deskripsi_barang }}</p>
                              </div>
                          </div>
                          </div>
                      </div>
                  </a>
              </div>                  
              @empty
                  <div class="col">
                    <p class="text-center">Belum ada pelelangan</p>
                  </div>
              @endforelse
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(function () {
        
    });
</script>
@endpush