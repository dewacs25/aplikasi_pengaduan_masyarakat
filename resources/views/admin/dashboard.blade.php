@extends('layouts.appAdmin')
@section('content_admin')
<div>
    <h1>Dashboard {{ Auth::guard('petugas')->user()->level }}</h1>
    <div class="row">
        <div class="col-4">
            <div class="card bg-danger border-0 text-light">
                hallo
            </div>
        </div>
        <div class="col-4 ms-1 ">
            <div class="card bg-warning border-0 text-light">
                hallo
            </div>
        </div>

    </div>
</div>
@endsection