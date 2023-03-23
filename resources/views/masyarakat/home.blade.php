@extends('layouts.appMasyarakat')
@section('content')
    <header>
        <div class="logo" style="display: flex;">
            <img src="{{ asset('img/logo.png') }}" style="width: 100px;" alt="Pengaduan Masyarakat">
            <h2>Pengaduan Masyarakat Secara Online</h5>
        </div>
    </header>

    @livewire('masyarakat.form-pengaduan')
@endsection
