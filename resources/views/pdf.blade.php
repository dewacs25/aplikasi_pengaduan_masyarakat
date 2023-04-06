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
        @php
            if ($data->foto) {
                $path = 'storage/image/laporan/'.$data->foto;
            }else{
                $path = 'img/imgNone.png';
            }
        @endphp
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($path))) }}" alt="" style="width: 200px">
        
    </center>

    <h4>Tanggapan :</h4>
    @foreach ($tanggapan as $row)
        <p>Nama Petugas : {{ $row->petugas->nama_petugas }} </p>
        {{ $row->tanggapan }}
    @endforeach

</body>
</html>
