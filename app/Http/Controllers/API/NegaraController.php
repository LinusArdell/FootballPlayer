<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Negara;
use Illuminate\Http\Request;

class NegaraController extends BaseController
{
    public function index(){
        $klub = Negara::all();
        $success['data'] = $klub;
        return $this->sendSuccess($success, 'Data negara Bola');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_negara' => 'required',
            'bendera' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        // Input foto gambar
        $ext = $request->bendera->getClientOriginalExtension();
        $nama_file = "bendera-" . time() . "." . $ext;
        $path = $request->bendera->storeAS('public', $nama_file);

        $klub = new Negara();
        $klub->nama_negara = $validasi['nama_negara'];
        $klub->bendera = $nama_file;

        if ($klub->save()){
            $success['data'] = $klub;
            return $this->sendSuccess($success, 'Data negara berhasil disimpan');
        } else {
            return $this->sendError('Error,', ['error' => 'Data negara gagal disimpan']);
        }
    }

    public function update(Request $request, Negara $pemain, $id)
    {
        $validasi = $request->validate([
            'nama_negara' => 'required',
            'bendera' => 'required|file|image|max:5000',
        ]);

        // Input foto gambar
        $ext = $request->bendera->getClientOriginalExtension();
        $nama_file = "bendera-" . time() . "." . $ext;
        $path = $request->bendera->storeAS('public', $nama_file);

        $pemain = Negara::find($id);
        $pemain->nama_negara = $validasi['nama_negara'];
        $pemain->bendera = $nama_file;

        if ($pemain->save()){
            $success['data'] = $pemain;
            return $this->sendSuccess($success, 'Data klub berhasil update');
        } else {
            return $this->sendError('Error,', ['error' => 'Data klub gagal update']);
        }
    }

    public function delete(Negara $pemain, $id)
    {
        $pemain = Negara::findOrFail($id);
        if ($pemain->delete()) {
            $success['data'] = [];
            return $this->sendSuccess($success, "Data negara berhasil dihapus");
        } else {
            return $this->sendError('Error', ['error' => "Data negara gagl dihapus"]);
        }
    }
}
