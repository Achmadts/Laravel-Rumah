@extends('template.master')

@section('title', "Aplikasi SPP | Detail SPP")

@section('header', 'Detail data Petugas')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="tahun" class="form-control form-control-user" placeholder="Tahun"
                        autocomplete="off" value="{{ $spp->tahun }}" disabled>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="nominal" class="form-control form-control-user" placeholder="Nominal"
                        autocomplete="off" value="Rp. {{ number_format($spp->nominal) }}" disabled>
                </div>
            </div>
            <div class="text-center">
                <a href="/spp" type="button" class="btn btn-secondary w-100">Back</a>
            </div>
            <hr>
        </div>
    </div>
@endsection
