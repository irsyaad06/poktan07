<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Petani;
use App\Models\HasilPanen;
use App\Models\Agen;
use App\Models\Kegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        $petaniCount = Petani::count();
        $panenCount = HasilPanen::count();
        $agenCount = Agen::count();
        $kegiatanCount = Kegiatan::count();

        $latestPetanis = Petani::latest()->take(5)->get();

        return view('admin.dashboard', compact('petaniCount', 'panenCount', 'agenCount', 'kegiatanCount', 'latestPetanis'));
    }
}
