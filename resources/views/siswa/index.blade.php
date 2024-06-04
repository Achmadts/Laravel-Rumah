@extends('template.master')

@push('css')
    <link href="{{ asset('sb_admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('title', 'Aplikasi SPP | Data Siswa')
@section('confirmDeleteName', 'Tindakan ini akan menghapus data pembayaran yang bersangkutan!')
@section('header', 'Data Siswa')

@section('button')
    <a href="{{ route('siswa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fa-solid fa-person-circle-plus fa-sm text-white-50"></i> Tambah Data Siswa</a>
    <a href="{{ route('siswaexport') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Spp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $key => $siswa)
                            <tr>
                                <td>
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT) }}
                                </td>
                                <td>
                                    {{ $siswa->nis }}
                                </td>
                                <td>
                                    {{ $siswa->nama }}
                                </td>
                                <td>
                                    @foreach ($kelases as $kelas)
                                        @if ($kelas->id_kelas == $siswa->id_kelas)
                                            {{ $kelas->nama_kelas }} {{ $kelas->kompetensi_keahlian }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{ $siswa->alamat }}
                                </td>
                                <td>
                                    {{ $siswa->no_telp }}
                                </td>
                                <td>
                                    @foreach ($spps as $spp)
                                        @if ($spp->id_spp == $siswa->id_spp)
                                            Rp. {{ number_format($spp->nominal) }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <form
                                        action="{{ route('siswa.destroy', str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT)) }}"
                                        method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                        <a href="{{ route('siswa.show', str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT)) }}"
                                            class="btn btn-sm btn-info"><i class="fa-solid fa-circle-info pt-1"></i>
                                            Detail</a>
                                        <a href="{{ route('siswa.edit', str_pad($siswa->nisn, 10, '0', STR_PAD_LEFT)) }}"
                                            class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i>
                                            Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" value="Hapus"><i
                                                class="fa-solid fa-trash-can"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Data Masih Kosong</td>
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
