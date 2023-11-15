<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        // $siswa = Siswa::orderBy('nis', 'asc')->paginate(5);
        // return view('siswa/index', compact('siswa'));
        $siswa = Siswa::all();
        return response()->json($siswa);
    }
    public function tampil()
    {
        return view('siswa/tambah');
    }
    public function tambah()
    {
        //
    }

    public function edit()
    {
        return view('siswa/edit');
    }
    public function update()
    {
        //
    }
    public function delete()
    {
        //
    }
}
