<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $tc = 10;
        if (strlen($keyword)) {
            $data =
                data::where('nis', 'like', "%$keyword%")
                ->orWhere('nama', 'like', "%$keyword%")
                ->orWhere('kelas', 'like', "%$keyword%")
                ->orWhere('jurusan', 'like', "%$keyword%")
                ->paginate($tc);

            if ($data->isEmpty()) {
                Session::flash('404', 'Data Tidak Ditemukan');
                return view('data/list')->with('data', $data);
            }
        } else {
            $data = data::orderBy('data_id', 'asc')->paginate($tc);
        }
        return view('data/list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session::flash('nis', $request->nis);
        session::flash('nama', $request->nama);
        session::flash('kelas', $request->kelas);
        session::flash('jurusan', $request->jurusan);
        $data = $request->validate([
            'nis' => 'required|numeric|unique:data',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ], [
            'nis.required' => 'Nis wajib diisi',
            'nis.numeric' => 'Nis Harus berupa angka',
            'nama.required' => 'Nama wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);

        // $data = [
        //     'nis' => $request->input('nis'),
        //     'nama' => $request->input('nama'),
        //     'kelas' => $request->input('kelas'),
        //     'jurusan' => $request->input('jurusan'),
        // ];

        data::create($data);

        return redirect('data')->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = data::where('data_id', $id)->first();
        return view('data/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = data::where('data_id', $id)->first();
        return view('data/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ], [
            'nis.required' => 'Nis wajib diisi',
            'nis.numeric' => 'Nis Harus berupa angka',
            'nama.required' => 'Nama wajib diisi',
            'kelas.required' => 'Kelas wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);
        data::where('data_id', $id)->update($data);
        return redirect('/data/')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        data::where('data_id', $id)->delete();
        return redirect('/data/')->with('success', 'Data Berhasil Dihapus');
    }
}
