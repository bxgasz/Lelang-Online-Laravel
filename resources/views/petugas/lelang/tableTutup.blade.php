<table class="table table-stiped table-bordered table-penjualan">
    <thead class="text-center">
        <th width="5%">No</th>
        <th>Nama Barang</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th width="15%"><i class="fa fa-cog"></i></th>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @forelse ($data as $item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->tgl_lelang }}</td>
            <td><span class="bg-danger text-white p-1 rounded">{{ $item->status }}</span></td>
            <td>
                <button data-status="dibuka" data-id="{{ $item->id_lelang }}" class="btn btn-xs btn-info btn-flat" id="status"><i class="fa fa-eye"></i></button>
                <button onclick="deleteData('{{ route('lelang.destroy', $item->id_lelang) }}')" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-sm">Tidak Ada Data</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex">
    {!! $data->links() !!}
</div>