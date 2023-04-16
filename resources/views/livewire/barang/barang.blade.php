<div>
    <div class="col-md-4">
        <div wire:ignore.self class="modal fade" id="modal-barang" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title font-weight-normal modal-title" id="modal-title-default">Tambah Data Barang</h6>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <form action="" wire:submit.prevent="saveData" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="input-group input-group-static mb-4">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" wire:model="nama">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>              
                    <div class="input-group input-group-static mb-4">
                        <label>Harga Awal Barang</label>
                        <input type="number" class="form-control" name="harga" wire:model="harga">
                        @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>              
                    <div class="input-group input-group-static mb-4">
                        <label>Deskripsi Barang</label>
                        <input type="text" class="form-control" wire:model="deskripsi">
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>              
                    <div class="input-group input-group-static mb-4">
                        <label>Gambar Barang</label>
                        <input type="file" class="form-control" wire:model="gambar" multiple>
                        @error('gambar.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div wire:loading wire:target="gambar">Uploading...</div> --}}
                    <div wire:loading.flex wire:target="gambar" class="loader loader--style2 justify-content-center">
                      <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                      <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                        <animateTransform attributeType="xml"
                          attributeName="transform"
                          type="rotate"
                          from="0 25 25"
                          to="360 25 25"
                          dur="0.6s"
                          repeatCount="indefinite"/>
                        </path>
                      </svg>
                    </div>
                    @if ($gambar)
                      @foreach ($gambar as $item)
                      <img src="{{ $item->temporaryUrl() }}" class="modal-img rounded-3 mb-2" alt="{{ $item }}">
                      @endforeach
                    @endif              
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal" wire:click="closeModal">Close</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div wire:ignore.self class="modal fade" id="modal-barangupdate" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title font-weight-normal modal-title" id="modal-title-default">Update Data Barang</h6>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <form action="" wire:submit.prevent="updateData" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="input-group input-group-static mb-4">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" wire:model.defer="nama">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>              
                    <div class="input-group input-group-static mb-4">
                        <label>Harga Awal Barang</label>
                        <input type="number" class="form-control" name="harga" wire:model.defer="harga">
                        @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>              
                    <div class="input-group input-group-static mb-4">
                        <label>Deskripsi Barang</label>
                        <input type="text" class="form-control" wire:model.defer="deskripsi">
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>              
                    <div class="input-group input-group-static mb-4">
                        <label>Gambar Barang</label>
                        <input type="file" class="form-control" wire:model.defer="gambar" multiple>
                        @error('gambar.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div wire:loading wire:target="gambar">Uploading...</div> --}}
                    <div wire:loading.flex wire:target="gambar" class="loader loader--style2 justify-content-center">
                      <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                      <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                        <animateTransform attributeType="xml"
                          attributeName="transform"
                          type="rotate"
                          from="0 25 25"
                          to="360 25 25"
                          dur="0.6s"
                          repeatCount="indefinite"/>
                        </path>
                      </svg>
                    </div>
                    @if ($gambar)
                      @foreach ($gambar as $item)
                      <img src="{{ $item->temporaryUrl() }}" class="modal-img rounded-3 mb-2" alt="{{ $item }}">
                      @endforeach
                    @endif
                    @foreach ($uploaded_gambar as $item => $i)
                      <div class="img-uploaded">
                        <button type="button" class="btn btn-danger btn-xs btn-del" onclick="deleteImage(this)" data-id="{{ $i->id_gambar }}" data-img="{{ $i->image }}"><i class="fa fa-times"></i></button>
                        <img src="{{ asset('/storage/'.$i->image) }}" class="modal-img rounded-3 mb-2 img-up @foreach($delImageid as $id) @if($id == $i->id_gambar) clicked @endif @endforeach" alt="{{ $i->image }}" id="{{ $i->id_gambar }}">
                      </div>
                    @endforeach              
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal" wire:click="closeModal">Close</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>
