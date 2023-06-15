<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Negara;
use App\Models\Pemain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $data['pemain'] = Pemain::all();
        $data['klub'] = Klub::all();
        $data['negara'] = Negara::all();
        $data['klubNegara'] = DB::select('SELECT p.nama_negara, COUNT(*) as jumlah 
        FROM klub K
        JOIN negaras p ON K.negara_id = p.id
        GROUP BY p.nama_negara');
        // dd($data['klubNegara']);
        return view('index', $data);
    }
}
