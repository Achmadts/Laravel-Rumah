@extends('template.master')

@section('title', 'Aplikasi SPP | Tambah Data Kelas')

@section('header', 'Tambah Kelas')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <form class="user" action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nama_kelas"
                            class="form-control form-control-user @error('nama_kelas') {{ 'is-invalid' }} @enderror"
                            placeholder="Nama Kelas" autocomplete="off" value="{{ old('nama_kelas') }}">
                        @error('nama_kelas')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input type="text" name="kompetensi_keahlian"
                            class="form-control form-control-user @error('kompetensi_keahlian') {{ 'is-invalid' }} @enderror"
                            placeholder="Kompetensi Keahlian" autocomplete="off" value="{{ old('kompetensi_keahlian') }}">
                        @error('kompetensi_keahlian')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Tambah Kelas</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
@endsection
