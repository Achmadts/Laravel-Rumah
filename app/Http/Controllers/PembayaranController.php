<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Pembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::with('siswa', 'user', 'spp')->get();
        $users = User::all();
        $spps = Spp::all();
        if (Auth::check()) {
            $user = Auth::user();
            return view('pembayaran.index', compact('pembayarans', 'users', 'spps', 'user'));
        }
    }

    /**
     * Export data pembayaran ke Excel.
     */
    public function exportpembayaran()
    {
        return Excel::download(new PembayaranExport, 'DataPembayaran.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
        $users = User::all();
        $spps = Spp::all();
        if (Auth::check()) {
            $user = Auth::user();
            return view('pembayaran.create', compact('siswas', 'users', 'spps', 'user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {
        // dd($request->all());
        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Pembayaran berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->firstOrFail();
        $siswa = Siswa::find($pembayaran->nisn);
        $user = User::find($pembayaran->user_id);
        $spp = Spp::find($pembayaran->id_spp);
        if (Auth::check()) {
            $user = Auth::user();
            return view("pembayaran.detail", compact('pembayaran', 'siswa', 'user', 'spp', 'user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->firstOrFail();
        $siswas = Siswa::all();
        $spps = Spp::all();
        $users = User::all();
        $spp = Spp::find($pembayaran->id_spp);
        $id_user_lama = $pembayaran->user_id;
        $nisn_siswa_lama = $pembayaran->nisn;
        $id_spp_lama = $pembayaran->id_spp;
        if (Auth::check()) {
            $user = Auth::user();
            return view("pembayaran.edit", compact('pembayaran', 'siswas', 'spps', 'users', 'spp', 'id_user_lama', 'nisn_siswa_lama', 'id_spp_lama', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        // dd($request->all());
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Pembayaran berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Pembayaran berhasil dihapus']);
    }
}
