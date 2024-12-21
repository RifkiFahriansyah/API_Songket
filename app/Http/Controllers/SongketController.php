<?php

namespace App\Http\Controllers;

use App\Models\songket;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SongketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songket = Songket::all();
        $data['message'] = true;
        $data['result'] = $songket;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'nama_songket' => 'required|string|max:255',
                'deskripsi' => 'required',
                'gambar' => 'required|string',
            ],
            [
                'nama_songket.required' => 'Nama Songket wajib diisi',
                'nama_songket.string' => 'Nama Songket harus berupa string',
                'nama_songket.max' => 'Nama Songket maksimal 255 karakter',
                'deskripsi.required' => 'Deskripsi wajib diisi',
                'gambar.required' => 'Gambar wajib diisi',
            ]
        );

        $result = Songket::create($validate);
        $data['success'] = true;
        $data['message'] = 'Data berhasil ditambahkan';
        $data['result'] = $result;
        return response()->json(['message' => 'Data berhasil disimpan'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(songket $dataSongket)
    {
        $songket = Songket::find($dataSongket);
        $data['success'] = true;
        $data['message'] = "Detail data fakultas";
        $data['result'] = $songket;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(songket $songket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate(
            [
                'nama_songket' => 'required|string|max:255',
                'deskripsi' => 'required',
                'gambar' => 'required|string',
            ],
            [
                'nama_songket.required' => 'Nama Songket wajib diisi',
                'nama_songket.string' => 'Nama Songket harus berupa string',
                'nama_songket.max' => 'Nama Songket maksimal 255 karakter',
                'deskripsi.required' => 'Deskripsi wajib diisi',
                'gambar.required' => 'Gambar wajib diisi',
            ]
        );


        $result = Songket::where('id', $id)->update($validate);
        $data['success'] = true;
        $data['message'] = 'Data berhasil diubah';
        $data['result'] = $result;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $songket = Songket::find($id);
        if($songket){
            $songket->delete();
            $data['success'] = true;
            $data['message'] = 'Data berhasil dihapus';
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = 'Data tidak ditemukan';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
