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
                'gambar' => 'required|file|image|max:5000',
            ],
            [
                'nama_songket.required' => 'Nama Songket wajib diisi',
                'nama_songket.string' => 'Nama Songket harus berupa string',
                'nama_songket.max' => 'Nama Songket maksimal 255 karakter',
                'deskripsi.required' => 'Deskripsi wajib diisi',
                'gambar.required' => 'Gambar wajib diisi',
                'gambar.file' => 'Gambar harus berupa file',
                'gambar.image' => 'Gambar harus berupa gambar',
                'gambar.max' => 'Gambar maksimal 5000 KB',
            ]
        );

        //untuk mengisi foto
        $ext = $request->gambar->getClientOriginalExtension();
        $nama_file = "gambar" . time() . "." . $ext;
        $path = $request->gambar->storeAs('public', $nama_file);

        $data = [
            'nama_songket' => $validate['nama_songket'],
            'deskripsi' => $validate['deskripsi'],
            'gambar' => $nama_file,
        ];
        Songket::create($data);
        return response()->json(['message' => 'Data berhasil disimpan'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(songket $songket)
    {
        $songket = Songket::find($songket);
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
                'gambar' => 'required|file|image|max:5000',
            ],
            [
                'nama_songket.required' => 'Nama Songket wajib diisi',
                'nama_songket.string' => 'Nama Songket harus berupa string',
                'nama_songket.max' => 'Nama Songket maksimal 255 karakter',
                'deskripsi.required' => 'Deskripsi wajib diisi',
                'gambar.required' => 'Gambar wajib diisi',
                'gambar.file' => 'Gambar harus berupa file',
                'gambar.image' => 'Gambar harus berupa gambar',
                'gambar.max' => 'Gambar maksimal 5000 KB',
            ]
        );
        // untuk mengisi foto
        $ext = $request->gambar->getClientOriginalExtension();
        $nama_file = "gambar" . time() . "." . $ext;
        $path = $request->gambar->storeAs('public', $nama_file);

        $data = [
            'nama_songket' => $validate['nama_songket'],
            'deskripsi' => $validate['deskripsi'],
            'gambar' => $nama_file,
        ];

        Songket::where('id', $id)->update($data);
        return redirect()->to('songket')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Songket::where('id', $id)->delete();
        return redirect()->to('songket')->with('success', 'Data berhasil dihapus');
    }
}
