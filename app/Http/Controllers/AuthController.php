<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormLoginRequest;
use App\Http\Requests\FormRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function doLogin(FormLoginRequest $request)
    {
        $credesntial = $request->validated();
        if (Auth::attempt($credesntial)) {
            $request->session()->regenerate();

            return redirect()->intended(route('blog.index'));
        }

        return to_route('auth.login')->withErrors([
            'email' => "erreur d'identifiannt"
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(FormRegisterRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect()->route('auth.login')->with('success', "Votre compte a bien été créé");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('blog.index'))->with('success', "Vous avez bien été déconnecté");
    }
}
