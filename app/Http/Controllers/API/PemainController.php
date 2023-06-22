<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Pemain;
use Illuminate\Http\Request;

class PemainController extends BaseController
{
    public function index(){
        $pemain = Pemain::all();
        $success['data'] = $pemain;
        return $this->sendSuccess($success, 'Data Pemain Bola');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nomor_punggung' => 'required',
            'posisi' => 'required',
            'foto' => 'required|image|max:5000',
            'klub_id' => 'required'
        ]);

        // Input foto gambar
        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = "foto-" . time() . "." . $ext;
        $path = $request->foto->storeAS('public', $nama_file);

        $pemain = new Pemain();
        $pemain->nama = $validasi['nama'];
        $pemain->nomor_punggung = $validasi['nomor_punggung'];
        $pemain->posisi = $validasi['posisi'];
        $pemain->klub_id = $validasi['klub_id'];
        $pemain->foto = $nama_file;

        if ($pemain->save()){
            $success['data'] = $pemain;
            return $this->sendSuccess($success, 'Data pemain berhasil disimpan');
        } else {
            return $this->sendError('Error,', ['error' => 'Data pemain gagal disimpan']);
        }
    }

    public function update(Request $request, Pemain $pemain, $id)
    {
        $this->authorize('create', Pemain::class);

        $validasi = $request->validate([
            'nama' => 'required',
            'nomor_punggung' => 'required',
            'posisi' => 'required',
            'foto' => 'required|image|max:5000',
            'klub_id' => 'required'
        ]);

        // Input foto gambar
        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = "foto-" . time() . "." . $ext;
        $path = $request->foto->storeAS('public', $nama_file);

        $pemain = Pemain::find($id);
        $pemain->nama_pemain = $validasi['nama'];
        $pemain->nomor_punggung = $validasi['nomor_punggung'];
        $pemain->posisi = $validasi['posisi'];
        $pemain->foto = $nama_file;
        $pemain->klub_id = $validasi['klub_id'];

        if ($pemain->save()){
            $success['data'] = $pemain;
            return $this->sendSuccess($success, 'Data pemain berhasil update');
        } else {
            return $this->sendError('Error,', ['error' => 'Data pemain gagal update']);
        }
    }

    public function delete(Pemain $pemain, $id)
    {
        $pemain = Pemain::findOrFail($id);
        if ($pemain->delete()) {
            $success['data'] = [];
            return $this->sendSuccess($success, "Data pemain berhasil dihapus");
        } else {
            return $this->sendError('Error', ['error' => "Data pemain gagl dihapus"]);
        }
    }
}
