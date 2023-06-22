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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Pemain::class);
        $validasi = $request->validate([
            'nama' => 'required',
            'nomor_punggung' => 'required',
            'posisi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png',
            'klub_id' => 'required'
        ]);

        $pemain = new Pemain();
        $pemain->nama = $validasi['nama'];
        $pemain->nomor_punggung = $validasi['nomor_punggung'];
        $pemain->posisi = $validasi['posisi'];

        $pemain->klub_id = $validasi['klub_id'];



    //input foto gambar
    $ext = $request->foto->getClientOriginalExtension();
    //                              "Nama File"
    //                                  v
            $new_file = $validasi['nama'].".".$ext;
    //                              "Nama Folder"
    //                                     v
            $request->foto->storeAS('public/pemain/',$new_file);

            $pemain->foto = $new_file;


        $pemain->save();


        return redirect()->route('pemain.index')->with('success', "data pemain ".$validasi["nama"]." berhasil ditambahkan");
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
    public function edit(Pemain $pemain)
    {
        $klub = Klub::orderBy('nama_klub', 'ASC')->get();
        return view('pemain.edit')->with('dataKlub',$klub)->with('pemain',$pemain);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemain $pemain)
{
    $this->authorize('update', Pemain::class);
    $validasi = $request->validate([
        'nama' => 'required',
        'nomor_punggung' => 'required',
        'posisi' => 'required',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png',
        'klub_id' => 'required'
    ]);

    $pemain->nama = $validasi['nama'];
    $pemain->nomor_punggung = $validasi['nomor_punggung'];
    $pemain->posisi = $validasi['posisi'];
    $pemain->klub_id = $validasi['klub_id'];

    if ($request->hasFile('foto')) {
        $ext = $request->foto->getClientOriginalExtension();
        $new_file = $validasi['nama'] . "." . $ext;
        $request->foto->storeAS('public/pemain/', $new_file);
        $pemain->foto = $new_file;
    }

    $pemain->save();

    return redirect()->route('pemain.index')->with('success', "Data pemain " . $validasi["nama"] . " berhasil diedit");
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemain $pemain, Request $request)
    {
        $this->authorize('destroy', Pemain::class);
        $pemain->delete();
        return redirect()->route('pemain.index')->with('success', 'Data berhasil di delete');
    }
    
    public function multiDelete(Request $request) {
        $ids = $request->ids;
        
        Pemain::whereIn('id', $ids)->delete();
        
        return response('Selected pemain(s) deleted successfully', 200);
    }
}
