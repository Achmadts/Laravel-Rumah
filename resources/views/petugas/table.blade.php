<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Nama Petugas</th>
            <th>Password</th>
            <th>Level</th>
            <th>Provider</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $key => $user)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ $user->username }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->nama_petugas }}
                </td>
                <td>
                    {{ $user->password }}
                </td>
                <td>
                    {{ $user->level }}
                </td>
                <td>
                    {{ $user->provider }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Data Masih Kosong</td>
            </tr>
        @endforelse
    </tbody>
</table>