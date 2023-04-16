    <div class="modal fade" id="modal-barang" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal-xl d-flex modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title font-weight-normal" id="modal-title-default">Pilih Barang</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-stiped table-bordered table-penjualan">
                <thead class="text-center">
                    <th width="5%">No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th width="15%"><i class="fa fa-cog"></i></th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($data as $item)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->harga_awal }}</td>
                        <td>{{ $item->deskripsi_barang }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-xs btn-flat text-white"
                                  onclick="pilihBarang('{{ $item->id_barang }}', '{{ $item->nama_barang }}')">
                                  <i class="fa fa-check-circle"></i>
                                  Pilih
                              </a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-sm">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>