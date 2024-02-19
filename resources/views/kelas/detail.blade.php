@extends('template.master')

@section('title', 'Aplikasi SPP | Detail Kelas')

@section('header', 'Detail data Kelas')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="ID Kelas" autocomplete="off"
                        value="ID KELAS: {{ $kelas->id_kelas }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Nama Kelas" autocomplete="off"
                        value="KELAS: {{ $kelas->nama_kelas }}" disabled>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Kompetensi Keahlian"
                        autocomplete="off" value="JURUSAN: {{ $kelas->kompetensi_keahlian }}" disabled>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('kelas.index') }}" type="button" class="btn btn-secondary w-100">Back</a>
            </div>
            <hr>
        </div>
    </div>
@endsection
