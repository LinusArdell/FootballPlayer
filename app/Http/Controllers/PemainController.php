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
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pemain $pemain)
    {
        //
        {
            $this->authorize('create', Pemain::class);
            $validasi = $request->validate([
                'nama' => 'required',
                'nomor_punggung' => 'required',
                'posisi' => 'required',
                'foto' => 'required|image|mimes:jpg,jpeg,png',
                'klub_id' => 'required'
            ]);


            $pemain->nama = $pemain->nama;
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemain $pemain)
    {
        $data = $pemain->id->delete();
        // return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
        return response("data berhasil dihapus", 200);
    }
    public function multiDelete(Request $request) {
        pemain::whereIn('id', $request->get('selected'))->delete();
        return response("selected pemain(s) delete successfully", 200);
    }
}
