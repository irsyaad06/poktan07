<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use App\Models\HasilPanen;
use App\Models\Agen;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $petanis = Petani::all();
        $kegiatans = Kegiatan::all();
        return view('welcome', compact('petanis', 'kegiatans'));
    }

    public function listAgen()
    {
        $agens = Agen::all();
        return view('listAgen', compact('agens'));
    }

    public function hasilPanen(Request $request)
    {
        $id = $request->get('id');
        $petani = Petani::with('hasilPanens')->find($id);
        $agens = Agen::all();
        
        return view('hasilpanenTani', compact('petani', 'agens'));
    }
}
