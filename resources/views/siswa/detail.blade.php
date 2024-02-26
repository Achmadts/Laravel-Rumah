@extends('template.master')

@section('title', 'Aplikasi SPP | Detail Siswa')

@section('header', 'Detail data Siswa')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="nisn" class="form-control form-control-user" autocomplete="off"
                        value="NISN: {{ str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT) }}" disabled>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="nis" class="form-control form-control-user" autocomplete="off"
                        value="NIS: {{ $siswa->nis }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="nama" class="form-control form-control-user" autocomplete="off"
                        value="NAMA: {{ $siswa->nama }}" disabled>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="id_kelas" class="form-control form-control-user" autocomplete="off"
                        value="ID Kelas: {{ $siswa->id_kelas }} | Kelas: {{ $kelas->nama_kelas }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="alamat" class="form-control form-control-user" autocomplete="off"
                        value="ALAMAT: {{ $siswa->alamat }}" disabled>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="no_telp" class="form-control form-control-user" autocomplete="off"
                        value="NO HP: {{ $siswa->no_telp }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="no_telp" class="form-control form-control-user" autocomplete="off"
                        value="ID SPP: {{ $siswa->id_spp }} | NOMINAL: Rp. {{ number_format($spp->nominal) }}" disabled>
                </div>
            </div>
            <div class="text-center">
                <a href="/siswa" type="button" class="btn btn-secondary w-100">Back</a>
            </div>
            <hr>
        </div>
    </div>
@endsection
