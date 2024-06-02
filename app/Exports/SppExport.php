<?php

namespace App\Exports;

use App\Models\Spp;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class SppExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): view
    {
        //
        $spps = Spp::select('id_spp','tahun', 'nominal')->get();
        return view('spp.table', ['spps' => $spps]);
    }
}
