<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class ProviderController extends Controller
{
    //
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            $email = $socialUser->getEmail();

            if (empty($email)) {
                return redirect('/')->withErrors(['notif' => 'Email tidak ada.']);
            }
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->id
            ])->first();
            if (!$user) {
                if (User::where('email', $email)->exists()) {
                    return redirect('/')->withErrors(['notif' => 'Email sudah terdaftar dengan metode login lain!']);
                }
                $user = User::create([
                    'nama_petugas' => $socialUser->getName(),
                    'username' => User::generateUserName($socialUser->getNickname()),
                    'email' => $email,
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
                ]);
            }
            // dd($user->toArray());
            Auth::login($user);
            if ($user->level == 'admin') {
                return redirect('/dashboard/admin');
            } elseif ($user->level == 'petugas') {
                return redirect('/dashboard/petugas');
            } else {
                return redirect('/');
            }
        } catch (\Exception $e) {
            return redirect('/');
        }
    }
}
