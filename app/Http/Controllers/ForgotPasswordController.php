<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function showLinkRequestForm()
    {
        return view('auth.password.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Logic to send reset link email
        // You might use a service or a built-in method to send the email

        return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
    }

    public function showResetForm($token)
    {
        return view('auth.password.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }

        return redirect()->route('login')->with('status', 'Password Anda telah berhasil direset.');
    }
}
