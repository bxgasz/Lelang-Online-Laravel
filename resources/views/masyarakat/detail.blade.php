@extends('layouts.masyarakat.master')

@section('title')
    Detail
@endsection

@push('css')
<style>
    .btn-submit{
        background: #4154f1;
        border: 0;
        padding: 10px 30px;
        color: #fff;
        transition: 0.4s;
        border-radius: 4px;
    }

    .btn-submit:hover {
        background: #5969f3;
    }

    .btn-delete{
        background: #f14141;
        border: 0;
        padding: 10px 30px;
        color: #fff;
        transition: 0.4s;
        border-radius: 4px;
    }

    .btn-delete:hover {
        background: #f35959;
    }

    .bidding{
        border-radius: 0;
        box-shadow: none;
        font-size: 14px;
        border-radius: 0;
    }

    .bidding:focus{
        box-shadow: none;
        border-color: #4154f1;
    }

    #modal-img .modal-img{
        width: 100%;
    }
</style>
@endpush

@section('content')
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-header">Waktu berakhir</div>
                    <div class="card-body">
                        @if ($lelang->harga_akhir == null)
                            {{ $batas }}
                        @else
                            --.--.--
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="row g-0 p-2">
                      <div class="col-md-6">
                        <img src="{{ asset('storage/'.$lelang->image->image) }}" class="img-fluid product-pic rounded-3" alt="..." width="100%">
                        <div class=" mt-2">
                            @foreach ($image as $item)
                                <img src="{{ asset('storage/'.$item->image) }}" class="img-fluid product-pic rounded-3" alt="..." width="100px" height="100px">
                            @endforeach
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h1 class="card-title fw-bold" style="text-transform: uppercase">{{ $lelang->barang->nama_barang }}</h1>
                          <hr>
                          <p class="card-text">Tertinggi :</p>
                          {{-- @if ($nominal_tertinggi != null)
                          <p class="card-text fw-bold">Rp. {{ number_format($nominal_tertinggi) }}</p>
                          @else
                          <p class="card-text fw-bold">Rp. {{ number_format($lelang->barang->harga_awal) }}</p>
                          @endif --}}
                          <p class="card-text fw-bold">Rp. {{ number_format($lelang->barang->harga_awal) }}</p>
                          <p class="card-text"><small class="text-muted">Deskripsi</small></p>
                          <p class="card-text">{{ $lelang->barang->deskripsi_barang }}</p>
                          @if (Auth::guard('masyarakat')->user() != null)
                            @if ($lelang->harga_akhir != null || $lelang->status == 'selesai')
                            <div class="row mb-2">
                                <div class="col bg-success text-center rounded-2 text-white p-2"><i class="bi bi-check-circle-fill"></i> Selesai</div>
                            </div>
                            <div class="row">
                                <a href="{{ route('masy.all') }}" class="col bg-primary text-center rounded-2 text-white p-2"><i class="bi bi-arrow-right-circle-fill"></i> Ikuti pelelangan lainnya</a>
                            </div>
                            @elseif ($lelang->status == 'ditutup')
                            <div class="row mb-2">
                                <div class="col bg-danger text-center rounded-2 text-white p-2"><i class="bi bi-x-circle-fill"></i> Ditutup Sementara</div>
                            </div> 
                            @else
                                @if ($penawaran_user != null && $penawaran_user->id_user == Auth::guard('masyarakat')->user()->id_user)
                                <form action="{{ route('masy.update', $penawaran_user->id_history) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="input-group row">
                                        <input type="hidden" name="id_lelang" value="{{ $lelang->id_lelang }}">
                                        <div class="col-2">
                                            <label for="" class="fw-bold">Rp. </label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control col-10 bidding @error('nominal') is-invalid @enderror" name="nominal" value="{{ $penawaran_user->penawaran_harga }}">
                                            @error('nominal')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group row mt-3 ps-2">
                                        <button type="submit" class="btn-submit col-12 rounded-1"><i class="bi bi-check-square-fill"></i> Update penawaran</button>
                                        <button type="button" onclick="deleteData('{{ route('masy.destroy', $penawaran_user->id_history) }}')" class="btn-delete col-12 mt-2 rounded-1"><i class="bi bi-trash"></i> Batalkan penawaran</button>
                                    </div>
                                </form>
                                @else
                                <form action="{{ route('masy.store') }}" method="post">
                                    @csrf
                                    <div class="input-group row">
                                        <input type="hidden" name="id_lelang" value="{{ $lelang->id_lelang }}">
                                        <div class="col-2">
                                            <label for="" class="fw-bold">Rp. </label>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control col-10 bidding @error('nominal') is-invalid @enderror" name="nominal">
                                            @error('nominal')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group row mt-3 ps-2">
                                        <button type="submit" class="btn-submit col-12 rounded-1"><i class="bi bi-check-square-fill"></i> Ikuti Lelang</button>
                                    </div>
                                </form>
                                @endif
                            @endif
                          @else
                            <div class="row">
                                <a href="{{ route('login.index') }}" class="col bg-primary text-center rounded-2 text-white p-2"><i class="bi bi-person-fill-lock"></i> Login untuk mengikuti pelelangan</a>
                            </div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-responsive text-center">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Penawaran</th>
                                <th scope="col">Tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($history as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->user->nama_lengkap }}</td>
                                        <td>Rp. {{ number_format($item->penawaran_harga) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Belum ada penawaran</td>
                                    </tr>
                                @endforelse
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('img/example.jpeg') }}" class="modal-img" alt="modal-img">
                </div>
                </div>
            </div>
         </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    let msg = '{{ Session::get('msg') }}';
    let exist = '{{ Session::has('msg') }}';
    $(function(){
        if(exist){
            toastr.error(msg, 'Gagal!!', {timeOut: 1500})
        }
        $('.product-pic').on('click', function(){
            const src = $(this).attr('src');
            $('.modal-img').attr('src', src);
            $('#modal-img').modal('show');
        })
    })

    function deleteData(url){
        Swal.fire({
            title: 'Yakin?',
            text: 'Apakah Anda igin membatalkan penawaran??',
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
                    toastr.success('Berhasil!!', 'Berhasil mengahpus data!', {timeOut: 1500})
                    window.setTimeout('location.reload()', 1500);
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