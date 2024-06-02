<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pembayaran</th>
            <th>ID Petugas</th>
            <th>NISN</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Dibayar</th>
            <th>Tahun Dibayar</th>
            <th>ID Spp</th>
            <th>Jumlah Bayar</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pembayarans as $key => $pembayaran)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $pembayaran->id_pembayaran }}
                </td>
                <td>
                    {{ $pembayaran->user_id }}
                </td>
                <td>
                    {{ $pembayaran->nisn }}
                </td>
                <td>
                    {{ $pembayaran->tgl_bayar }}
                </td>
                <td>
                    {{ $pembayaran->bulan_dibayar }}
                </td>
                <td>
                    {{ $pembayaran->tahun_dibayar }}
                </td>
                <td>
                    {{ $pembayaran->id_spp }}
                </td>
                <td>
                    {{ $pembayaran->jumlah_bayar }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Data Masih Kosong</td>
            </tr>
        @endforelse
    </tbody>
</table>