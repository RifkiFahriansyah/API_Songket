<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $pengaduan = Pengaduan::all();
            $data['message'] = true;
            $data['result'] = $pengaduan;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = request()->validate([
            'email'=> 'required|email',
            'no_telp'=> 'required',
            'isi' => 'required',
        ]);

        $result = Pengaduan::create($validate);
        $data['success'] = true;
        $data['messae'] = 'Data berhasil ditambahkan';
        $data['result'] = $result;
        return response()->json($data,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(pengaduan $pengaduan)
    {
        $pengaduan = Pengaduan::find($pengaduan);
        $data['success'] = true;
        $data['message'] = 'Data pengaduan';
        $data['result'] = $pengaduan;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        if($pengaduan){
            $pengaduan->delete();
            $data['success'] = true;
            $data['message'] = 'Data Pengaduan Berhasil Dihapus';
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = 'Data Pengaduan Tidak Ditemukan';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
