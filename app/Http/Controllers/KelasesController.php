<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelases;
use App\Models\Pembayaran;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreKelasesRequest;
use App\Http\Requests\UpdateKelasesRequest;

class KelasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelases = Kelases::all();
        return view('kelas.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasesRequest $request, Kelases $kelas)
    {
        //
        $kelas->create($request->all());
        return redirect()->route('kelas.index')->with(['success' => 'Data Kelas berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas = Kelases::find($id);
        return view('kelas.detail', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelases $kela)
    {
        //
        return view("kelas.edit", compact("kela"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasesRequest $request, Kelases $kela)
    {
        //
        $kela->update($request->all());
        return redirect()->route('kelas.index')->with(['success' => 'Data Kelas berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelases $kela)
    {
        $id_kelas_di_hapus = $kela->id_kelas;
        $nisn_siswa_di_kelas = Siswa::where('id_kelas', $id_kelas_di_hapus)->pluck('nisn');
        Pembayaran::whereIn('id_spp', function ($query) use ($nisn_siswa_di_kelas) {
            $query->select('id_spp')->from('siswas')->whereIn('nisn', $nisn_siswa_di_kelas);
        })->delete();
        Siswa::where('id_kelas', $id_kelas_di_hapus)->delete();
        $kela->delete();
        return redirect()->route('kelas.index')->with(['success' => 'Data Kelas, Siswa, dan Pembayaran yang terkait berhasil dihapus']);
    }
}
