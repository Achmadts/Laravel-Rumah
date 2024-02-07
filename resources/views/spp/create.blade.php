@extends('template.master')

@section('header', 'Tambah Data Spp')

@section('rowTengah')
    <div class="col-lg-12">
        <div class="p-5">
            <form class="user" action="{{ route('spp.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="tahun"
                            class="form-control form-control-user @error('tahun') {{ 'is-invalid' }} @enderror"
                            placeholder="Tahun" autocomplete="off">
                        @error('tahun')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <input type="number" name="nominal"
                            class="form-control form-control-user @error('nominal') {{ 'is-invalid' }} @enderror"
                            placeholder="Nominal" autocomplete="off">
                        @error('nominal')
                            <span class="error invalid-feedback" style="display: inline">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Tambah Data Spp</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
@endsection
