@extends('template.master')

@section('title', 'Aplikasi SPP | Edit Data Pembayaran')

@section('header', 'Edit Data Pembayaran')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" autocomplete="off"
                        value="NAMA PETUGAS: {{ $pembayaran->user->nama_petugas }}" disabled>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" autocomplete="off"
                        value="NISN: {{ str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT) }} | NAMA: {{ $siswa->nama }}" disabled>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" autocomplete="off"
                        value="TANGGAL BAYAR: {{ $pembayaran->tgl_bayar }}" disabled>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" autocomplete="off"
                        value="BULAN DIBAYAR: {{ $pembayaran->bulan_dibayar }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" autocomplete="off"
                        value="TAHUN DIBAYAR: {{ $pembayaran->tahun_dibayar }}" disabled>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" autocomplete="off"
                        value="ID SPP: {{ $spp->id_spp }} | Nominal: Rp. {{ number_format($spp->nominal) }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" autocomplete="off"
                        value="JUMLAH BAYAR: Rp. {{ number_format($pembayaran->jumlah_bayar) }}" disabled>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('pembayaran.index') }}" type="button" class="btn btn-secondary w-100">Back</a>
            </div>
            <hr>
        </div>
    </div>
@endsection
