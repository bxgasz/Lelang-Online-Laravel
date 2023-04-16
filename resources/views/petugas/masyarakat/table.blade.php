<table class="table table-stiped table-bordered table-penjualan">
    <thead class="text-center">
        <th width="5%">No</th>
        <th>Nama User</th>
        <th>Email</th>
        <th>Username</th>
        <th width="15%"><i class="fa fa-cog"></i></th>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @forelse ($data as $item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->username }}</td>
            <td>
                <div class="btn-group">
                    <button onclick="deleteData('{{ route('masyarakat.destroy', $item->id_user) }}')" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
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

{{-- <div class="d-flex">
    {!! $data->links() !!}
</div> --}}