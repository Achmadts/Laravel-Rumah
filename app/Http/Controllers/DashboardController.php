<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function petugas()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('dashboard.petugas', compact('user'));
        }
        return redirect()->route('auth.login')->withErrors(['notif' => 'Login dulu Pea'])->onlyInput('email');
    }

    public function admin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('dashboard.admin', compact('user'));
        }
        return redirect()->route('auth.login')->withErrors(['notif' => 'Login dulu Pea'])->onlyInput('email');
    }
}
