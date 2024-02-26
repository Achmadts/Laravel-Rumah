<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
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
                    {{ $spp->tahun }}
                </td>
                <td>
                    Rp. {{ number_format($spp->nominal) }}
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
                <td colspan="4" class="text-center">Data Masih Kosong</td>
            </tr>
        @endforelse
    </tbody>
</table>
