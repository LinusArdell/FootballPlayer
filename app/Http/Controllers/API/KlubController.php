<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Klub;
use Illuminate\Http\Request;

class KlubController extends BaseController
{
    public function index(){
        $klub = Klub::all();
        $success['data'] = $klub;
        return $this->sendSuccess($success, 'Data Klub Bola');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_klub' => 'required',
            'nama_manager' => 'required',
            'logo' => 'required|file|image|max:5000',
            'negara_id' => 'required'
        ]);

        // Input foto gambar
        $ext = $request->logo->getClientOriginalExtension();
        $nama_file = "logo-" . time() . "." . $ext;
        $path = $request->logo->storeAS('public', $nama_file);

        $klub = new Klub();
        $klub->nama_klub = $validasi['nama_klub'];
        $klub->nama_manager = $validasi['nama_manager'];
        $klub->negara_id = $validasi['negara_id'];
        $klub->logo = $nama_file;

        if ($klub->save()){
            $success['data'] = $klub;
            return $this->sendSuccess($success, 'Data klub berhasil disimpan');
        } else {
            return $this->sendError('Error,', ['error' => 'Data klub gagal disimpan']);
        }
    }

    public function update(Request $request, Klub $pemain, $id)
    {
        $validasi = $request->validate([
            'nama_klub' => 'required',
            'nama_manager' => 'required',
            'logo' => 'required|file|image|max:5000',
            'negara_id' => 'required'
        ]);

        // Input foto gambar
        $ext = $request->logo->getClientOriginalExtension();
        $nama_file = "logo-" . time() . "." . $ext;
        $path = $request->logo->storeAS('public', $nama_file);

        $pemain = Klub::find($id);
        $pemain->nama_klub = $validasi['nama_klub'];
        $pemain->nama_manager = $validasi['nama_manager'];
        $pemain->logo = $nama_file;
        $pemain->negara_id = $validasi['negara_id'];

        if ($pemain->save()){
            $success['data'] = $pemain;
            return $this->sendSuccess($success, 'Data klub berhasil update');
        } else {
            return $this->sendError('Error,', ['error' => 'Data klub gagal update']);
        }
    }

    public function delete(Klub $pemain, $id)
    {
        $pemain = Klub::findOrFail($id);
        if ($pemain->delete()) {
            $success['data'] = [];
            return $this->sendSuccess($success, "Data klub berhasil dihapus");
        } else {
            return $this->sendError('Error', ['error' => "Data klub gagl dihapus"]);
        }
    }
}
