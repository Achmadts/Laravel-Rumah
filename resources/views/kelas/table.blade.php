<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Kelas</th>
            <th>Nama Kelas</th>
            <th>Kompetensi Keahlian</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kelases as $key => $kelas)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $kelas->id_kelas }}
                </td>
                <td>
                    {{ $kelas->nama_kelas }}
                </td>
                <td>
                    {{ $kelas->kompetensi_keahlian }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Data Masih Kosong</td>
            </tr>
        @endforelse
    </tbody>
</table>