@extends('template.master')

@section('title', 'Aplikasi SPP | Edit Data Petugas')

@section('header', 'Edit data Petugas')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <form action="{{ route('petugas.update', $petuga) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="username"
                            class="form-control form-control-user @error('username') {{ 'is-invalid' }} @enderror"
                            placeholder="Username" autocomplete="off" value="{{ $petuga->username }}">
                        @error('username')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input type="password" name="password"
                            class="form-control form-control-user @error('password') {{ 'is-invalid' }} @enderror"
                            placeholder="Password" autocomplete="off" value="{{ $petuga->password }}">
                        @error('password')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" name="nama_petugas"
                            class="form-control form-control-user @error('nama_petugas') {{ 'is-invalid' }} @enderror"
                            placeholder="nama_petugas" autocomplete="off" value="{{ $petuga->nama_petugas }}">
                        @error('nama_petugas')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <select class="form-select rounded-5 @error('level') {{ 'is-invalid' }} @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="level" id="levelSelect">
                            <option value="" selected disabled>Pilih Level</option>
                            <option value="admin" @if ($petuga->level == 'admin') selected @endif>Admin</option>
                            <option value="petugas" @if ($petuga->level == 'petugas') selected @endif>Petugas</option>
                        </select>
                        @error('level')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Edit Data Petugas</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
@endsection
