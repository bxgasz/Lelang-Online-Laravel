<table class="table table-stiped table-bordered" style="font-size: 85%">
    <thead class="text-center">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Harga</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Status</th>
            <th scope="col" style="width:15%"><i class="fa fa-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @forelse ($data as $item)
        <tr class="text-center">
            <td scope="row">{{ $no++ }}</td>
            <td><span class="@if ($item->status == 'terjual') bg-danger text-white rounded-2 p-1 @else  bg-success text-white rounded-2 p-1 @endif">{{ $item->nama_barang }}</span></td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->harga_awal }}</td>
            <td>{{ $item->deskripsi_barang }}</td>
            <td>
                <div class="input-group input-group-static">
                    <select class="form-control text-center p-0" id="status" data-id="{{ $item->id_barang }}">
                      <option value="ready" @if ($item->status == 'ready') selected @endif>Ready</option>
                      <option value="terjual" @if ($item->status == 'terjual') selected @endif>Terjual</option>
                    </select>
                  </div>
            </td>
            <td>
                <div class="btn-group">
                    <button onclick="editData('{{ $item->id_barang }}')" class="btn btn-xs btn-info btn-flat" data-bs-toggle="modal" data-bs-target="#modal-barangupdate"><i class="fa fa-edit"></i></button>
                    @if ($item->status == 'ready')
                    <button onclick="deleteData('{{ route('barang.destroy', $item->id_barang) }}')" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                    @endif
                </div>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-sm">Tidak Ada Data</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex">
    {!! $data->links() !!}
</div>