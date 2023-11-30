<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class AuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch(InvalidStateException) {
            return redirect()->route('login');
        }

        $user = User::updateOrCreate([
            'email' => $googleUser->email
        ], [
            'name' => $googleUser->name,
            'avatar' => $googleUser->avatar
        ]);

        auth()->login($user, true);

        return redirect()->route('dashboard');
    }
}
