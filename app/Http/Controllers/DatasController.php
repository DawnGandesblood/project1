<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DatasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = data::orderBy('data_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'data ditemukan',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Data();
        $rules = [
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => "Gagal Memasukkan Data", 
                    'data' => $validator->errors(),
                ],
                401
            );
        }
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->save();

        return response()->json(
            [
                'status' => true,
                'message' => 'Berhasil Memasukkan Data',
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        //
    }
}
