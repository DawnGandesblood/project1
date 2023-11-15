<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function user(Request $request)
    {
        $data = new user();
        $rules = [
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Proses Validasi Gagal',
                'data' => $validator->errors(),
            ], 401);
        }
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Memasukkan Data',
        ], 200);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Proses Login Gagal',
                'data' => $validator->errors(),
            ], 401);
        }
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => 'Email Atau Password Salah!',
            ], 401);
        }
        $data = user::where('email', $request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil Login',
            'token' => $data->createToken('api-data')->plainTextToken,
        ]);
    }
}
