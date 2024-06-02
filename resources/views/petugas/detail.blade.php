@extends('template.master')

@section('title', 'Aplikasi SPP | Detail Petugas')

@section('header', 'Detail data Petugas')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="username" autocomplete="off"
                        value="USERNAME: {{ $user->username }}" disabled>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Nama Petugas"
                        autocomplete="off" value="NAMA: {{ $user->nama_petugas }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Password" autocomplete="off"
                        value="PASSWORD: {{ $user->password }}" disabled>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Level" autocomplete="off"
                        value="LEVEL: {{ $user->level }}" disabled>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('user.index') }}" type="button" class="btn btn-secondary w-100">Back</a>
            </div>
            <hr>
        </div>
    </div>
@endsection
