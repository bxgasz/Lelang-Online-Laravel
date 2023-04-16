<table class="table table-stiped table-bordered table-penjualan">
    <thead class="text-center">
        <tr>
            <th>Tanggal</th>
            <th>Penjualan</th>
            <th>Pendapatan</th>
        </tr>
    </thead>
    <tbody class="text-center text-sm">
        @forelse ($data as $item)
            <tr>
                <td>{{ $item['tanggal'] }}</td>
                <td>{{ $item['penjualan'] }}</td>
                <td>{{ $item['pendapatan'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Tidak ada Data</td>
            </tr>
        @endforelse
    </tbody>
</table>