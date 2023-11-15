<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller

{

    function register()
    {
        return view('session/register');
    }

    function registerStore(Request $request)
    {
        session::flash('nama', $request->nama);
        session::flash('email', $request->email);
        $data = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            're_password' => 'required|same:password',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.max' => 'Nama memiliki lebih dari :max karakter',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus dalam format yang benar.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki setidaknya :min karakter.',
            're_password.required' => 'Re-password harus diisi',
            're_password.same' => 'Re-password tidak sama',
        ]);

        $data['password'] = hash::make($data['password']);

        User::create($data);

        return redirect('login')->with('success', 'Akun Berhasil Dibuat!');
    }
    function login()
    {
        return view('session/login');
    }



    function loginStore(Request $request)
    {
        session::flash('email', $request->email);
        $request->validate(

            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email Wajib diisi',
                'password.required' => 'Password Wajib diisi',
            ]
        );
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();
            return redirect('dashboard')->with('success', 'Login Berhasil');
        }
        return back()->with('message', 'Login Gagal, Coba Lagi');
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
