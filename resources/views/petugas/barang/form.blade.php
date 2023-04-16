<div class="col-md-4">
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title font-weight-normal modal-title" id="modal-title-default">Type your modal title</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            @method('post')
              <div class="modal-body">
                <div class="input-group input-group-static mb-4">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" required name="nama">
                    <div class="invalid-feedback">Nama Barang Diperlukan!</div>
                </div>              
                <div class="input-group input-group-static mb-4">
                    <label>Harga Awal Barang</label>
                    <input type="number" class="form-control" required name="harga">
                    <div class="invalid-feedback">Harga Awal Diperlukan!</div>
                </div>              
                <div class="input-group input-group-static mb-4">
                    <label>Deskripsi Barang</label>
                    <input type="text" class="form-control" required name="deskripsi_barang">
                    <div class="invalid-feedback">Deskripsi Diperlukan!</div>
                </div>              
                <div class="input-group input-group-static mb-4">
                    <label>Gambar Barang</label>
                    <input type="file" class="form-control" required name="gambar[]" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="4">
                    <div class="invalid-feedback">Deskripsi Diperlukan!</div>
                </div>              
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>