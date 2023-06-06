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
            'negara' => 'required',
            'bendera' => 'required'
        ]);

        $negara = new Negara();
        $negara->negara = $validasi['negara'];
        $negara->bendera = $validasi['bendera'];
        $negara->save();

        return redirect()->route('negara.index')->with('success', "data neagra ".$validasi['negara']." berhasil disimpan");
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
