<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSppRequest;
use App\Http\Requests\UpdateSppRequest;
use App\Models\Pembayaran;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $spps = Spp::all();
        return view('spp.index', compact('spps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSppRequest $request, Spp $spp)
    {
        //
        $spp->create($request->all());
        return redirect()->route('spp.index')->with(['success' => 'Data spp berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        //
        return view('spp.detail', compact('spp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spp $spp)
    {
        //
        return view("spp.edit", compact("spp"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSppRequest $request, Spp $spp)
    {
        //
        $spp->update($request->all());
        return redirect()->route('spp.index')->with(['success' => 'Data Spp berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spp $spp)
    {
        $id_spp_di_hapus = $spp->id_spp;
        Pembayaran::where('id_spp', $id_spp_di_hapus)->delete();
        Siswa::where('id_spp', $id_spp_di_hapus)->delete();
        $spp->delete();
        return redirect()->route('spp.index')->with(['success' => 'Data Spp, siswa, dan pembayarannya yang terkait berhasil dihapus']);
    }
}
