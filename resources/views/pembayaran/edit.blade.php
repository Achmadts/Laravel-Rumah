@extends('template.master')

@section('title', 'Aplikasi SPP | Edit Data Pembayaran')

@section('header', 'Edit Data Pembayaran')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <form class="user" action="{{ route('pembayaran.update', $pembayaran->id_pembayaran) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-select rounded-5" style="padding-top: 11px; padding-bottom: 11px" name="user_id"
                            id="kelasSelect">
                            <option value="" selected disabled>Petugas</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if ($id_user_lama == $user->id) selected @endif>
                                    ID: {{ $user->id }} | Nama: {{ $user->nama_petugas }}
                                </option>
                            @endforeach
                        </select>
                        @error('id')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <select class="form-select rounded-5 @error('nisn') {{ 'is-invalid' }} @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="nisn">
                            <option value="" selected disabled>NISN Siswa</option>
                            @foreach ($siswas as $siswa)
                                <option value="{{ str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT) }}"
                                    @if ($nisn_siswa_lama == str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT)) selected @endif>
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
                            placeholder="Masukkan Tanggal Bayar" autocomplete="off" value="{{ $pembayaran->tgl_bayar }}">
                        @error('tgl_bayar')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="bulan_dibayar"
                            class="form-control form-control-user @error('bulan_dibayar') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan Bulan Dibayar" autocomplete="off"
                            value="{{ $pembayaran->bulan_dibayar }}">
                        @error('bulan_dibayar')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="tahun_dibayar"
                            class="form-control form-control-user @error('tahun_dibayar') {{ 'is-invalid' }} @enderror"
                            placeholder="Masukkan Tahun Dibayar" autocomplete="off"
                            value="{{ $pembayaran->tahun_dibayar }}">
                        @error('tahun_dibayar')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-select rounded-5 @error('id_spp') is-invalid @enderror"
                            style="padding-top: 11px; padding-bottom: 11px" name="id_spp">
                            <option value="" selected disabled>Id Spp</option>
                            @foreach ($spps as $spp)
                                <option value="{{ $spp->id_spp }}" @if ($id_spp_lama == $spp->id_spp) selected @endif>
                                    ID: {{ $spp->id_spp }} | Nominal: Rp. {{ number_format($spp->nominal) }} | Nama:
                                    {{ $siswa->nama }}</option>
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
                            placeholder="Masukkan Jumlah Bayar" autocomplete="off" value="{{ $pembayaran->jumlah_bayar }}">
                        @error('jumlah_bayar')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Edit Data Pembayaran</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
@endsection
