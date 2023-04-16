<div class="col-md-4">
    <div class="modal fade" id="modal-tanggal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title font-weight-normal modal-title" id="modal-title-default">Ubah periode Laporan</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="{{ route('laporan.index') }}" method="get" class="needs-validation" novalidate>
            @csrf
              <div class="modal-body">
                <div class="input-group input-group-static mb-4">
                    <label>Tanggal Awal</label>
                    <input type="date" class="form-control" required name="tanggalAwal">
                    <div class="invalid-feedback">Tentukan Tanggal Awal</div>
                </div>              
                <div class="input-group input-group-static mb-4">
                    <label>tanggal Akhir</label>
                    <input type="date" class="form-control" required name="tanggalAkhir">
                    <div class="invalid-feedback">Tentukan Tanggal Akhir</div>
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