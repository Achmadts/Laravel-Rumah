<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(StoreAuthRequest $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (auth()->user()->level == 'petugas') {
                if (isset($data['remember']) && !empty($data['remember'])) {
                    setcookie("email", $data['email'], time() + 3600);
                    setcookie("password", $data['password'], time() + 3600);
                    setcookie("remember", $data['remember'], time() + 3600);
                } else {
                    setcookie("email", "");
                    setcookie("password", "");
                    setcookie("remember", "");
                }
                return redirect()->route('dashboard.petugas');
            } else {
                if (isset($data['remember']) && !empty($data['remember'])) {
                    setcookie("email", $data['email'], time() + 3600);
                    setcookie("password", $data['password'], time() + 3600);
                    setcookie("remember", $data['remember'], time() + 3600);
                } else {
                    setcookie("email", "");
                    setcookie("password", "");
                    setcookie("remember", "");
                }
                return redirect()->route('dashboard.admin');
            }
        }
        return back()->withErrors([
            'notif' => 'Kredensial tidak valid',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')
            ->withSuccess('Anda telah keluar dari sistem');
    }
}
