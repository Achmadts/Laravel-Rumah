<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nisn</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Spp</th>
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
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Data Masih Kosong</td>
            </tr>
        @endforelse
    </tbody>
</table>