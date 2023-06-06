<?php

namespace App\Http\Controllers;

use App\Models\KlubBola;
use App\Models\Pemain;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PemainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $keyword = $request->query('search');
        // if ($keyword){
        //     $pemain = Pemain::where('nama,')
        // }

        return view('pemain.index')->with('pemain');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $klub_bola = KlubBola::class;
        return view('pemain.create')->with('klub_bola', $klub_bola);
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
            'klub_id' => 'required'
        ]);

        $pemain = new Pemain();
        $pemain->nama = $validasi['nama'];
        $pemain->nomor_punggung = $validasi['nomor_punggung'];
        $pemain->posisi = $validasi['posisi'];
        $pemain->klub_id = $validasi['klub_id'];

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
        return redirect()->route('')->with('success', 'Data berhasil dihapus');
    }
}
