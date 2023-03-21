@extends('layouts.appMasyarakat')
@section('content')
    <header>
        <div class="logo" style="display: flex;">
            <img src="{{ asset('img/logo.png') }}" style="width: 100px;" alt="Pengaduan Masyarakat">
            <h2>Pengaduan Masyarakat Secara Online</h5>
        </div>
    </header>
    
    <nav>
        <ul>
            <li><a href="#">Petugas</a></li>
            <li><a href="#">Pengaduan</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </nav>

    {{--  desktop  --}}
    <div class="content">
        @livewire('masyarakat.form-pengaduan')
    </div>
@endsection
