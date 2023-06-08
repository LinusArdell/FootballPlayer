<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\KlubBola;
use App\Models\Negara;
use App\Models\Pemain;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PemainController extends Controller
{
    public function index()
    {
        // $keyword = $request->query('search');
        // if ($keyword){
        //     $pemain = Pemain::where('nama,')
        // }
        $pemain = Pemain::all();
        return view('pemain.index')->with('dataPemain', $pemain);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klub = Klub::orderBy('nama_klub', 'ASC')->get();
        return view('pemain.create')->with('dataKlub', $klub);

        $negara = Negara::orderBy('nama_negara', 'ASC')->get();
        return view('pemain.create')->with('dataNegara', $negara);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nomor_punggung' => 'required',
            'posisi' => 'required',
            'foto' => 'required',
            'klub_id' => 'required',
            'negara_id' => 'required'
        ]);

        $pemain = new Pemain();
        $pemain->nama = $validasi['nama'];
        $pemain->nomor_punggung = $validasi['nomor_punggung'];
        $pemain->posisi = $validasi['posisi'];
        $pemain->klub_id = $validasi['klub_id'];
        $pemain->negara_id = $validasi['negara_id'];
        $pemain->save();

        $pemain->foto = $validasi['foto'];
        return redirect()->route('')->with('success', "data pemain ".$validasi["nama"]." berhasil ditambahkan");
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
    public function destroy(Pemain $pemain)
    {
        $pemain->delete;
        return redirect()->route('pemain.index')->with('success', 'Data berhasil dihapus');
    }
}
