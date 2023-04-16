<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>

    <link rel="stylesheet" href="{{ asset('asset-user/vendor/bootstrap/css/bootstrap.css')}}">
    <style>
        .table{

        }

        
    </style>
</head>
<body>
    <h3 class="text-center">Laporan Pendapatan</h3>
    <h4 class="text-center">
        Tanggal {{ $awal, false }}
        s/d
        Tanggal {{ $akhir, false }}
    </h4>

    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($data as $item)
                <tr>
                    @foreach ($item as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>