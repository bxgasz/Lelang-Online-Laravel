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
          <form action="" method="post" class="needs-validation" novalidate>
            @csrf
            @method('post')
              <div class="modal-body">
                <div class="input-group input-group-static mb-4">
                    <label>Nama Petugas</label>
                    <input type="text" class="form-control" required name="nama">
                    <div class="invalid-feedback">Nama Petugas Diperlukan!</div>
                </div>              
                <div class="input-group input-group-static mb-4">
                    <label>Username</label>
                    <input type="text" class="form-control" required name="username">
                    <div class="invalid-feedback">Username Diperlukan!</div>
                </div>              
                <div class="input-group input-group-static mb-4">
                    <label>Email</label>
                    <input type="email" class="form-control" required name="email">
                    <div class="invalid-feedback">Email Diperlukan!</div>
                </div>              
                <div class="input-group input-group-static mb-4">
                    <label>Password</label>
                    <input type="password" class="form-control" required name="password">
                    <div class="invalid-feedback">Password Diperlukan!</div>
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