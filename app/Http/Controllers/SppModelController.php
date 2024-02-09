<?php

namespace App\Http\Controllers;

use App\Models\SppModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SppController;

class SppModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $spps = DB::table('spps')->get();
        return view("spp.index", compact('spps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("spp.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tahun' => 'required|numeric|digits:4',
            'nominal' => 'required|min:6|numeric',
        ]);

        // proses insert data
        $query = DB::table('spps')->insert([
            'tahun' => $request['tahun'],
            'nominal' => $request['nominal'],
        ]);
        return redirect()->route('spp.index')->with(['success' => 'Data spp telah ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $spp = DB::table('spps')->where('id_spp', $id)->first();
        return view("spp.detail", compact('spp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $spp = DB::table('spps')->where('id_spp', $id)->first();
        return view('spp.edit', compact("spp"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'tahun' => 'required|numeric|digits:4',
            'nominal' => 'required|min:6|numeric',
        ]);

        // proses insert data
        $query = DB::table('spps')->where("id_spp", $id)->update([
            'tahun' => $request['tahun'],
            'nominal' => $request['nominal'],
        ]);
        return redirect()->route('spp.index')->with(['success' => 'Data spp berhasil di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('spps')->where("id_spp", $id)->delete();
        return redirect()->route('spp.index')->with(['success' => 'Data spp berhasil dihapus']);
    }
}