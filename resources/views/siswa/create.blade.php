@extends('template.master')

@section('title', 'Aplikasi SPP | Tambah Data Siswa')

@section('header', 'Tambah Data Siswa')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <form class="user" action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nisn"
                            class="form-control form-control-user @error('nisn') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan NISN" autocomplete="off" value="{{ @old('nisn') }}">
                        @error('nisn')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input type="text" name="nis"
                            class="form-control form-control-user @error('nis') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan NIS" autocomplete="off" value="{{ @old('nis') }}">
                        @error('nis')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nama"
                            class="form-control form-control-user @error('nama') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan Nama" autocomplete="off" value="{{ @old('nama') }}">
                        @error('nama')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <select class="form-select rounded-5 @error('id_kelas') {{ 'is-invalid' }} @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="id_kelas" id="kelasSelect">
                            <option value="" selected disabled>ID Kelas</option>
                            @foreach ($kelases as $kelas)
                                <option value="{{ $kelas->id_kelas }}">{{ $kelas->nama_kelas }} |
                                    {{ $kelas->kompetensi_keahlian }}</option>
                            @endforeach
                        </select>
                        @error('id_kelas')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="alamat"
                        class="form-control form-control-user @error('alamat') {{ 'is-invalid' }} @enderror"
                        placeholder="Masukkan Alamat" autocomplete="off" value="{{ @old('alamat') }}">
                    @error('alamat')
                        <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="no_telp"
                            class="form-control form-control-user @error('no_telp') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan no telpon" autocomplete="off" value="{{ @old('no_telp') }}">
                        @error('no_telp')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <select class="form-select rounded-5 @error('id_spp') {{ 'is-invalid' }} @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="id_spp" id="sppSelect">
                            <option value="" selected disabled>ID SPP</option>
                            @foreach ($spps as $spp)
                                <option value="{{ $spp->id_spp }}">Tahun {{ $spp->tahun }} | Rp.
                                    {{ number_format($spp->nominal) }}</option>
                            @endforeach
                        </select>
                        @error('id_spp')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Tambah Data Siswa</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
@endsection
