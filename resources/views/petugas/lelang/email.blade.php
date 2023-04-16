<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lunatic</title>
</head>
<body>
    <h1>Selamat Kepada {{ $pemenang }}</h1>
    <br>
    <p>
        Selamat kepada user dengan username <b>{{ $pemenang }}</b> karena sudah memenangkan lelang yang diselenggarakan pada tanggal <b>{{ $tgl_lelang }}</b>.
    </p>
    
    <p>untuk pembayaran bisa mengirimkan ke no rek :</p>
    <h4>####</h4>
    <br>

    <p>total nominal yang harus dilunasi untuk mengklaim barang lelang <b>{{ $barang }}</b> :</p>
    <h4>Rp. {{ number_format($harga) }}</h4>

    <p>Terima kasih atas partisipasinya, Hadiah akan segera dikirimkan setelah uang diterima.</p>

    
</body>
</html>