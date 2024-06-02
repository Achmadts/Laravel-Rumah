@extends('template.master')

@section('title', 'Aplikasi SPP | Tambah Data Petugas')

@section('header', 'Tambah petugas')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <form class="user" action="{{ route('petugas.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nama_petugas"
                            class="form-control form-control-user @error('nama_petugas') {{ 'is-invalid' }} @enderror"
                            placeholder="Nama Petugas" autocomplete="off" value="{{ old('nama_petugas') }}">
                        @error('nama_petugas')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input type="text" name="username"
                            class="form-control form-control-user @error('username') {{ 'is-invalid' }} @enderror"
                            placeholder="Username" autocomplete="off" value="{{ old('username') }}">
                        @error('username')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-12 mt-3 mb-sm-0">
                            <input type="text" name="email"
                                class="form-control form-control-user @error('email') {{ 'is-invalid' }} @enderror"
                                placeholder="Email" autocomplete="off" value="{{ old('email') }}">
                            @error('email')
                                <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="password" name="password"
                            class="form-control form-control-user @error('password') {{ 'is-invalid' }} @enderror"
                            placeholder="Password" autocomplete="off" value="{{ old('password') }}">
                        @error('password')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <select class="form-select rounded-5 @error('level') {{ 'is-invalid' }} @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="level" id="levelSelect">
                            <option value="" disabled {{ old('level') == '' ? 'selected' : '' }}>Pilih Level
                            </option>
                            <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ old('level') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                        </select>
                        @error('level')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Tambah Petugas</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
@endsection
