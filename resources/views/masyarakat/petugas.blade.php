@extends('layouts.appMasyarakat')
@section('content')
    <header>
        <div class="logo" style="display: flex;">
            <img src="{{ asset('img/logo.png') }}" style="width: 100px;" alt="Pengaduan Masyarakat">
            <h2>Pengaduan Masyarakat Secara Online</h5>
        </div>
    </header>
    
    @include('layouts.navMasyarakatMobile')


    {{--  desktop  --}}
    <div class="content">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <img src="{{ asset('img/logo.png') }}" alt="" style="max-height: 50px; max-width: 50px; border-radius: 50%; border: 1px solid">
                </div>
            </div>
        </div>
    </div>
@endsection
