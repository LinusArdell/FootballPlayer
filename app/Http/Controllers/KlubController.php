<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Negara;
use Illuminate\Http\Request;

class KlubController extends Controller
{
    public function index()
    {
        $klub = Klub::all();
        return view('klub.index')->with('dataKlub', $klub);
    }

    public function create()
    {
        $negara = Negara::orderBy('nama_negara', 'ASC')->get();
        return view('klub.create')->with('dataNegara', $negara);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_klub' => 'required',
            'nama_manager' => 'required',
            'logo' => 'required|file|image|mimes:jpg,jpeg,png',
            'negara_id' => 'required'
        ]);

        $klub = new Klub();
        $klub->nama_klub = $validasi['nama_klub'];
        $klub->nama_manager = $validasi['nama_manager'];

        $klub->negara_id = $validasi['negara_id'];


        //input foto gambar
        $ext = $request->logo->getClientOriginalExtension();
//                              "Nama File"
//                                  v
        $new_file = $validasi['nama_klub'].".".$ext;
//                              "Nama Folder"
//                                     v
   $path = $request->logo->storeAS('public/logo',$new_file);

        $klub->logo = $new_file;
        $klub->save();

        return redirect()->route('klub.index')->with('success', "data klub ".$validasi['nama_klub']." berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klub $dataKlub)
    {
        //
        $dataKlub->delete();
        // return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
        return response("data berhasil dihapus", 200);
    }
}
