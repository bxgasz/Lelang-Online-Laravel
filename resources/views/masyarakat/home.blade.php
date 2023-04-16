@extends('layouts.masyarakat.master')

@section('title')
    Home
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('img-banner/slide1.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img-banner/slide-2.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img-banner/slide-3.jpeg') }}" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <section>
        <div class="container" data-aos="fade-up">
            <div class="header d-flex justify-content-between">
                <h2>Product</h2>
                <hr class="fw-bold mx-4" style="flex-grow: 1">
                <a href=""><p>See More..</p></a>
            </div>

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

  </main><!-- End #main -->
@endsection