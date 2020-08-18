<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
        <td colspan="5">FORMAT DATA OBAT E-PUSKESMAS {{strtoupper(Auth::user()->puskesmas->nama)}}</td>
        </tr>
        <tr>
            <td colspan="5">STOK OBAT</td>
        </tr>
        <tr>
            <td>No</td>
            <td>Nama Obat</td>
            <td>Satuan</td>
            <td>Gudang</td>
            <td>Apotik</td>
        </tr>
        <tr>
            <td>1</td>
            <td>Paracetamol</td>
            <td>Kapsul</td>
            <td>100</td>
            <td>50</td>
        </tr>
    </table>
</body>
</html>