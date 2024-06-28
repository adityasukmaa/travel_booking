<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            switch (auth()->user()->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                case 'superadmin':
                    return redirect()->route('superadmin.dashboard');
                    break;
                default:
                    return redirect()->route('user.dashboard');
                    break;
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Add other authentication methods as needed...
}
