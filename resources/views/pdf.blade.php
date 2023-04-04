<!DOCTYPE html>
<html>
<head>
    <title>PDF Export</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body style="background-color: #fff; color: black;">
    
    <h1 style="text-align: center; color: black;">Data Laporan Masyarakat</h1>
    <hr>
    <br><br><br>
    <p>Nama : {{ $data->masyarakat->nama }}</p>
    <p>Username : {{ $data->masyarakat->username }}</p>
    
    <h4>Isi Laporan :</h4>
    <p>{{ $data->isi_laporan }}</p>
    <center>

        <h4>Foto Laporan</h4>
        <img src="{{ public_path('storage/image/laporan/' . $data->foto) }}" alt="">
    </center>

</body>
</html>
