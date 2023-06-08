<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Negara::all();
        return view('negara.index')->with('dataNegara', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('negara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_negara' => 'required',
            'bendera' => 'required'
        ]);

        $negaras = new Negara();
        $negaras->nama_negara = $validasi['nama_negara'];
        $negaras->bendera = $validasi['bendera'];
        $negaras->save();

        return redirect()->route('negara.index')->with('success', "data negara ".$validasi['nama_negara']." berhasil disimpan");
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
