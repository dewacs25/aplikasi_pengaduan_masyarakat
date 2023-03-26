@extends('layouts.appAdmin')
@section('content_admin')
@include('layouts.alert') 

    <div>

        <h1>Detail Pengaduan</h1>
        <a href="/admin/laporan" class="btn btn-sm btn-transparent"><span><img src="{{ asset('img/back.svg') }}" width="30px"
                    alt=""></span></a>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <p>Username : {{ $dataPengaduan->masyarakat->username }}</p>
                    <p>Nama : {{ $dataPengaduan->masyarakat->nama }}</p>
                    <hr>
                    <h4 class="text-dark">Isi Laporan</h4>
                    <p>{{ $dataPengaduan->isi_laporan }}</p>
                </div>
                <div class="card">
                    <h3 class="text-dark">Foto :</h3>
                    @php
                        $foto = $dataPengaduan->foto;
                        if ($dataPengaduan->foto == null) {
                            $foto = '../../../img/imgNone.png';
                        }
                    @endphp
                    <img src="{{ asset('storage/image/laporan/' . $foto) }}" width="100%" alt="">
                    <h3 class="text-dark">Status :</h3>
                    <span
                        class="text-light 
                                @if ($dataPengaduan->status == 'proses') bg-warning
                                @elseif($dataPengaduan->status == 'selesai')
                                bg-success @endif
                                "
                        style="margin-right: 10px; padding: 2px; padding-left: 10px; padding-right: 10px; border-radius: 10px">
                        {{ $dataPengaduan->status }}
                    </span>
                </div>
                <div class="card">
                    <h3 class="text-dark">Tanggapan</h3>
                    @foreach ($dataTanggapan as $isi)
                        <p>{{ $isi->tanggapan }}</p>
                    @endforeach

                </div>

            </div>

            <div class="col-6">
                <div class="card">

                    @if ($errors->any())
                        @foreach ($errors->all() as $er)
                            <p style="font-size: 12px; color: red">{{ $er }}</p>
                        @endforeach
                    @endif
                    <form method="POST" action="/admin/laporan/tanggapan/{{ $dataPengaduan->id_pengaduan }}">
                        @csrf
                        <textarea name="tanggapan" class="form-control mb-1" rows="6" placeholder="Berikan Tanggapan"></textarea>
                        <button type="submit" class="btn btn-sm btn-secondary">Kirim</button>
                    </form>
                </div>
                <div class="card d-flex">
                    @if ($dataPengaduan->status == 'selesai')
                        <form action="/admin/laporan/unverified/{{ $dataPengaduan->id_pengaduan }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">Unverified</button>
                        </form>
                    @else
                    <form action="/admin/laporan/verified/{{ $dataPengaduan->id_pengaduan }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-primary">Verified</button>
                    </form>
                    @endif
                    <form action="/admin/laporan/hapus/{{ $dataPengaduan->id_pengaduan }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
