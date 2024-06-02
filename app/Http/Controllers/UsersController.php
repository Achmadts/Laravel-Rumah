<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        if (Auth::check()) {
            $user = Auth::user();
            return view('petugas.index', compact('users'));
        }
    }

    /**
     * Export data user/petugas ke Excel.
     */
    public function exportuser()
    {
        return Excel::download(new UserExport, 'DataPetugas.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::check()) {
            $user = Auth::user();
            return view('petugas.create', compact('user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, User $User)
    {
        //
        $User->create($request->all());
        return redirect()->route('user.index')->with(['success' => 'Data Petugas berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Auth::check()) {
            $user = User::find($id);
            return view('petugas.detail', compact('user'));
        }
        return redirect()->route('login')->with('error', 'Please log in to view this page.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (Auth::check()) {
            return view("petugas.edit", compact('user'));
        }
        return redirect()->route('login')->with('error', 'Login dulu banh.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        // dd($request->all());
        $user->update($request->all());
        return redirect()->route('user.index')->with(['success' => 'Data petugas berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $id = $user->id;
        Pembayaran::where('user_id', $id)->delete();
        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'Data petugas dan pembayarannya berhasil dihapus']);
    }
}
