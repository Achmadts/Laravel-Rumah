<?php

namespace App\Exports;

use App\Models\Kelases;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UserExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): view
    {
        //
        $users = User::all(); 
        return view('petugas.table', ['users' => $users]);
    }
}
