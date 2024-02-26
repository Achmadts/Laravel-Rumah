@extends('template.master')

@section('title', 'Aplikasi SPP | Edit Data Siswa')

@section('header', 'Edit data Siswa')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <form class="user" action="{{ route('siswa.update', str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT)) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nisn"
                            class="form-control form-control-user @error('nisn') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan nama kelas" autocomplete="off"
                            value="{{ str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT) }}">
                        @error('nisn')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input type="text" name="nis"
                            class="form-control form-control-user @error('nis') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan kompetensi keahlian" autocomplete="off" value="{{ $siswa->nis }}">
                        @error('nis')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nama"
                            class="form-control form-control-user @error('nama') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan nama kelas" autocomplete="off" value="{{ $siswa->nama }}">
                        @error('nama')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <select class="form-select rounded-5" style="padding-top: 11px; padding-bottom: 11px"
                            name="id_kelas" id="kelasSelect">
                            <option value="" selected disabled>ID Kelas</option>
                            @foreach ($kelases as $kelas)
                                <option value="{{ $kelas->id_kelas }}" @if ($id_kelas_lama == $kelas->id_kelas) selected @endif>
                                    {{ $kelas->nama_kelas }}</option>
                            @endforeach
                        </select>
                        @error('id_kelas')
                        <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="alamat"
                            class="form-control form-control-user @error('alamat') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan nama kelas" autocomplete="off" value="{{ $siswa->alamat }}">
                        @error('alamat')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input type="text" name="no_telp"
                            class="form-control form-control-user @error('no_telp') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan kompetensi keahlian" autocomplete="off" value="{{ $siswa->no_telp }}">
                        @error('no_telp')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <select class="form-select rounded-5" style="padding-top: 11px; padding-bottom: 11px" name="id_spp"
                            id="kelasSelect">
                            <option value="" selected disabled>ID Spp</option>
                            @foreach ($spps as $spp)
                                <option value="{{ $spp->id_spp }}" @if ($id_spp_lama == $spp->id_spp) selected @endif>
                                    {{ $spp->id_spp }}</option>
                            @endforeach
                        </select>
                        @error('id_spp')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Edit Data Siswa</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
@endsection
