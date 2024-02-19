<?php

namespace App\Http\Controllers;

use App\Models\Petugass;
use App\Http\Requests\StorePetugassRequest;
use App\Http\Requests\UpdatePetugassRequest;

class PetugassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $petugases = Petugass::all();
        return view('petugas.index', compact('petugases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetugassRequest $request, Petugass $petugass)
    {
        //
        $petugass->create($request->all());
        return redirect()->route('petugas.index')->with(['success' => 'Data Petugas berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $petugas = Petugass::find($id);
        return view('petugas.detail', compact('petugas'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugass $petuga)
    {
        //
        return view("petugas.edit", compact("petuga"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetugassRequest $request, Petugass $petuga)
    {
        //
        $petuga->update($request->all());
        return redirect()->route('petugas.index')->with(['success' => 'Data petugas berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petugass $petuga)
    {
        $petuga->delete();
        return redirect()->route('petugas.index')->with(['success' => 'Data petugas dan pembayarannya berhasil dihapus']);
    }
}
