<?php

namespace App\Exports;

use App\Models\Siswa;
use App\Models\Kelases;
use App\Models\Spp;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class SiswaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): view
    {
        //
        $siswas = Siswa::select('nisn','nis', 'nama', 'id_kelas', 'alamat', 'no_telp', 'id_spp')->get();
        $kelases = Kelases::all(); 
        $spps = Spp::all(); 
        return view('siswa.table', ['siswas' => $siswas, 'kelases' => $kelases, 'spps' => $spps]);
    }
}
