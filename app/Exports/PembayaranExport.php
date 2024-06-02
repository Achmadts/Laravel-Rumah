<?php

namespace App\Exports;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PembayaranExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): view
    {
        //
        $pembayarans = Pembayaran::select('id_pembayaran', 'user_id', 'nisn', 'tgl_bayar', 'bulan_dibayar', 'tahun_dibayar', 'id_spp', 'jumlah_bayar')->get();
        $spps = Spp::select('id_spp')->get();
        $siswas = Siswa::select('nisn')->get();
        $users = User::select('id')->get();
        return view('pembayaran.table', ['pembayarans' => $pembayarans, 'spps' => $spps, 'siswas' => $siswas, 'users' => $users]);
    }
}
