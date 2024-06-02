<?php

namespace App\Exports;

use App\Models\Kelases;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class KelasExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): view
    {
        //
        $kelases = Kelases::all(); 
        return view('kelas.table', ['kelases' => $kelases]);
    }
}
