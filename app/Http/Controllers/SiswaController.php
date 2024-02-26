<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Kelases;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswas = Siswa::all();
        $kelases = Kelases::all();
        $spps = Spp::all();
        return view('siswa.index', compact('siswas', 'kelases', 'spps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelases = Kelases::all();
        $spps = Spp::all();
        return view('siswa.create', compact('kelases', 'spps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request, Siswa $siswa)
    {
        //
        $siswa->create($request->all());
        return redirect()->route('siswa.index')->with(['success' => 'Data Siswa berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::where('nisn', $id)->firstOrFail();
        $kelas = Kelases::find($siswa->id_kelas);
        $spp = Spp::find($siswa->id_spp);
        return view("siswa.detail", compact('siswa', 'kelas', 'spp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $siswa = Siswa::where('nisn', $id)->firstOrFail();
        $kelases = Kelases::all();
        $spps = Spp::all();
        $id_kelas_lama = $siswa->id_kelas;
        $id_spp_lama = $siswa->id_spp;
        return view("siswa.edit", compact('siswa', 'kelases', 'spps', 'id_kelas_lama', 'id_spp_lama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        //
        // dd($request->all());
        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with(['success' => 'Data siswa berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $siswa = Siswa::where('nisn', $id)->first();
        $id_spp = $siswa->id_spp;
        Pembayaran::where('id_spp', $id_spp)->delete();
        $siswa->delete();
        return redirect()->route('siswa.index')->with(['success' => 'Data siswa berhasil dihapus']);
    }
}
