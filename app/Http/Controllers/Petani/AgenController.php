<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\Agen;

class AgenController extends Controller
{
    public function index()
    {
        $agens = Agen::all();
        return view('petani.agen.index', compact('agens'));
    }
}
