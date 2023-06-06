<?php

namespace App\Http\Controllers;

use App\Models\KlubBola;
use App\Models\Negara;
use Illuminate\Http\Request;

class KlubBolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klub = KlubBola::all();
        return view('klub_bola.index')->with('klub_bola', $klub);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $negara = Negara::orderBy('negara', 'ASC')->get();
        return view('klub_bola.create')->with('negara', $negara);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_klub' => 'required|unique:klub_bola',
            'nama_manager' => 'required',
            'negara_id' => 'required',
            'logo' => 'required'
        ]);

        $klub = new KlubBola();
        $klub->nama_klub = $validasi['nama_klub'];
        $klub->nama_manager = $validasi['nama_manager'];
        $klub->logo = $validasi['logo'];
        $klub->save();

        return redirect()->route('klub_bola.index')->with('success', "data klub ".$validasi["nama_klub"]." berhasil disimpan");
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
    public function destroy(string $id)
    {
        //
    }
}
