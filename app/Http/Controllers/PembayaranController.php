<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Petugass;
use App\Models\Siswa;
use App\Models\Spp;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::all();
        $siswas = Siswa::join('spps', 'siswas.id_spp', '=', 'spps.id_spp')->get(['siswas.id_spp', 'spps.nominal']);
        $petugases = Petugass::all();
        $spps = Spp::all();
        return view('pembayaran.index', compact('pembayarans', 'siswas', 'petugases', 'spps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $siswas = Siswa::all();
        $petugases = Petugass::all();
        $spps = Spp::all();
        return view('pembayaran.create', compact('siswas', 'petugases', 'spps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
        $pembayaran->create($request->all());
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Pembayaran berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->firstOrFail();
        $siswa = Siswa::find($pembayaran->nisn);
        $petugas = Petugass::find($pembayaran->id_petugas);
        $spp = Spp::find($pembayaran->id_spp);
        return view("pembayaran.detail", compact('pembayaran', 'siswa', 'petugas', 'spp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->firstOrFail();
        $siswas = Siswa::all();
        $spps = Spp::all();
        $petugases = Petugass::all();
        $spp = Spp::find($pembayaran->id_spp);
        $id_petugas_lama = $pembayaran->id_petugas;
        $nisn_siswa_lama = $pembayaran->nisn;
        $id_spp_lama = $pembayaran->id_spp;
        return view("pembayaran.edit", compact('pembayaran', 'siswas', 'spps', 'petugases', 'spp', 'id_petugas_lama', 'nisn_siswa_lama', 'id_spp_lama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
        // dd($request->all());
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Pembayaran berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Pembayaran berhasil dihapus']);
    }
}
