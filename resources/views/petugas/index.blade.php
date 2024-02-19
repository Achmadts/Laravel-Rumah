@extends('template.master')

@push('css')
    <link href="{{ asset('sb_admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('title', 'Aplikasi SPP | Data Petugas')
@section('confirmDeleteName', 'Mau hapus data Petugas?')
@section('header', 'Data Petugas')

@section('button')
    <a href="{{ route('petugas.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fa-solid fa-user-plus fa-sm text-white-50"></i> Tambah Data Petugas</a>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                            <th>ID</th>
                            <th>Nama Petugas</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($petugases as $key => $petugas)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $petugas->id_petugas }}
                                </td>
                                <td>
                                    {{ $petugas->nama_petugas }}
                                </td>
                                <td>
                                    {{ $petugas->level }}
                                </td>
                                <td>
                                    <form action="{{ route('petugas.destroy', $petugas->id_petugas) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                        <a href="{{ route('petugas.show', $petugas->id_petugas) }}" class="btn btn-sm btn-info"><i
                                                class="fa-solid fa-circle-info pt-1"></i> Detail</a>
                                        <a href="{{ route('petugas.edit', $petugas->id_petugas) }}" class="btn btn-sm btn-primary"><i
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
