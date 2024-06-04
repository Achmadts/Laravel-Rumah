@extends('template.master')

@push('css')
    <link href="{{ asset('sb_admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('title', 'Aplikasi SPP | Data SPP')
@section('confirmDeleteName', 'spp')
@section('header', 'Data Spp')

@section('button')
    <a href="{{ route('spp.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fa-solid fa-hand-holding-dollar fa-sm text-white-50"></i> Tambah Data Spp</a>
    <a href="{{ route('exportspp') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
@endsection

@section('rowTengah')
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Spp</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($spps as $key => $spp)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $spp->id_spp }}
                                </td>
                                <td>
                                    {{ $spp->tahun }}
                                </td>
                                <td>
                                    {{ $spp->nominal }}
                                </td>
                                <td>
                                    <form action="{{ route('spp.destroy', $spp->id_spp) }}" method="POST"
                                        onsubmit="return confirm('Yakin mau hapus data ini?')">
                                        <a href="{{ route('spp.show', $spp->id_spp) }}" class="btn btn-sm btn-info"><i
                                                class="fa-solid fa-circle-info pt-1"></i> Detail</a>
                                        <a href="{{ route('spp.edit', $spp->id_spp) }}" class="btn btn-sm btn-primary"><i
                                                class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" value="Hapus"><i
                                                class="fa-solid fa-trash-can"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Masih Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('sb_admin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/js/demo/datatables-demo.js') }}"></script>

    <script>
        $(function() {
            $("#table").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
