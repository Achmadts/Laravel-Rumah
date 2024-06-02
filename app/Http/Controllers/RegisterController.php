<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreRegisterRequest;

class RegisterController extends Controller
{
    //

    public function create(){
        return view('auth.register');
    }

    public function store(StoreRegisterRequest $request){
        // dd($request->all());
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'nama_petugas' => $request->nama_petugas,
            'password' => $request->password,
        ]);
        return view('auth.login');
    }
}