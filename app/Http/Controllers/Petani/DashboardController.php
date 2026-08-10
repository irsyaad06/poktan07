<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petani = auth()->user()->petani;
        $totalHasilPanen = $petani ? $petani->hasilPanens()->count() : 0;
        
        return view('petani.dashboard', compact('petani', 'totalHasilPanen'));
    }
}
