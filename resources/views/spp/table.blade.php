<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($spps as $key => $spp)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $spp->tahun }}
                </td>
                <td>
                    Rp. {{ number_format($spp->nominal) }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Data Masih Kosong</td>
            </tr>
        @endforelse
    </tbody>
</table>
