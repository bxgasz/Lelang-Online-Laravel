@extends('layouts.petugas.master')

@section('title')
    Tambah Data Lelang
@endsection

@section('pages')
    Tambah Lelang
@endsection

@section('sidebar')
    style="z-index:auto"
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tambah Data Lelang</h6>
                    </div>
                </div>
                <div class="card-body pb-2 ">
                    <form action="{{ route('lelang.store') }}" method="post" class="needs-validation text-start">
                        @csrf
                        <input type="hidden" name="id_barang" value="" id="id_barang"> 
                        @method('post')
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-7">
                                <div class="input-group input-group-static mb-4">
                                  <label>Barang</label>
                                  <input type="text" name="barang" class="form-control" required="" id="barang" readonly onclick="tampilBarang()">
                                </div>
                              </div>
                              <div class="col-5">
                                <div class="row">
                                  <button onclick="tampilBarang()" class="btn bg-gradient-info btn-flat col" type="button"><i class="fa fa-home"></i></button>  
                                </div>  
                              </div>    
                            </div>          
                            <div class="input-group input-group-static mb-4">
                                <label>Tanggal Lelang</label>
                                <input type="date" class="form-control" required name="tgl_lelang">
                                @error('msg')
                                <div class="invalid-feedback d-block">{{ $message }}</div>    
                                @enderror
                            </div>                          
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn bg-gradient-primary">Save</button>
                            <a href="{{ url()->previous() }}" class="btn btn-link  ml-auto">Close</a>
                          </div>
                      </form>
                    @includeIf('petugas.lelang.barang')
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function tampilBarang()
    {
      $('#modal-barang').modal('show');
    }

    function pilihBarang(id,nama){
      $('#id_barang').val(id);
      $('#barang').val(nama);
      $('#modal-barang').modal('hide');
    }
    
</script>
@endpush
