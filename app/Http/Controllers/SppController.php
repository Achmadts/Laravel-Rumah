<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use App\Exports\SppExport;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreSppRequest;
use App\Http\Requests\UpdateSppRequest;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spps = Spp::all();
        if (Auth::check()) {
            $user = Auth::user();
            return view('spp.index', compact('spps', 'user'));
        }
    }

    /**
     * Export data spp ke Excel.
     */
    public function sppexport()
    {
        return Excel::download(new SppExport, 'DataSPP.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('spp.create', compact('user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSppRequest $request)
    {
        Spp::create($request->all());
        return redirect()->route('spp.index')->with(['success' => 'Data spp berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('spp.detail', compact('spp', 'user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spp $spp)
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view("spp.edit", compact("spp", 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSppRequest $request, Spp $spp)
    {
        $spp->update($request->all());
        return redirect()->route('spp.index')->with(['success' => 'Data Spp berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spp $spp)
    {
        $spp->delete();
        return redirect()->route('spp.index')->with(['success' => 'Data Spp, siswa, dan pembayarannya yang terkait berhasil dihapus']);
    }
}
