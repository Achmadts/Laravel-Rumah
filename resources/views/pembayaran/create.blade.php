@extends('template.master')

@section('title', 'Aplikasi SPP | Tambah Data Pembayaran')

@section('header', 'Tambah Data Pembayaran')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <form class="user" action="{{ route('pembayaran.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-select rounded-5 @error('id_petugas') {{ 'is-invalid' }} @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="id_petugas">
                            <option value="" selected disabled>Petugas</option>
                            @foreach ($petugases as $petugas)
                                <option value="{{ $petugas->id_petugas }}"
                                    {{ old('id_petugas') == $petugas->id_petugas ? 'selected' : '' }}>
                                    {{ $petugas->nama_petugas }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_petugas')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <select class="form-select rounded-5 @error('nisn') {{ 'is-invalid' }} @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="nisn">
                            <option value="" selected disabled>NISN Siswa</option>
                            @foreach ($siswas as $siswa)
                                <option value="{{ str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT) }}"
                                    {{ old('nisn') == $siswa->nisn ? 'selected' : '' }}>
                                    {{ str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT) }} | {{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                        @error('nisn')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" name="tgl_bayar"
                            class="form-control form-control-user @error('tgl_bayar') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan Tanggal Bayar" autocomplete="off" value="{{ @old('tgl_bayar') }}">
                        @error('tgl_bayar')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="bulan_dibayar"
                            class="form-control form-control-user @error('bulan_dibayar') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan Bulan Dibayar" autocomplete="off" value="{{ @old('bulan_dibayar') }}">
                        @error('bulan_dibayar')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="tahun_dibayar"
                            class="form-control form-control-user @error('tahun_dibayar') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan Tahun Dibayar" autocomplete="off" value="{{ @old('tahun_dibayar') }}">
                        @error('tahun_dibayar')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-select rounded-5 @error('id_spp') is-invalid @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="id_spp">
                            <option value="" selected disabled>Id Spp</option>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id_spp }}"
                                    {{ old('id_spp') == $siswa->id_spp ? 'selected' : '' }}>
                                    {{ $siswa->id_spp }} | Rp. {{ number_format($siswa->spp->nominal) }} | Nama: {{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_spp')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name="jumlah_bayar"
                            class="form-control form-control-user @error('jumlah_bayar') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan Jumlah Bayar" autocomplete="off" value="{{ @old('jumlah_bayar') }}">
                        @error('jumlah_bayar')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Tambah Data Pembayaran</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
@endsection
