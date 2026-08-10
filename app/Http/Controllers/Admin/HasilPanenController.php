<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HasilPanen;
use App\Models\Petani;

class HasilPanenController extends Controller
{


    public function index()
    {
        $hasilPanens = HasilPanen::with('petani')->latest()->get();
        return view('admin.hasil-panen.index', compact('hasilPanens'));
    }

    public function create()
    {
        $petanis = Petani::all();
        return view('admin.hasil-panen.create', compact('petanis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'petani_id' => 'required|exists:petanis,id',
            'name' => 'required',
            'type' => 'nullable',
            'grade' => 'nullable',
            'qty' => 'nullable',
            'price' => 'nullable',
            'image' => 'nullable'
        ]);

        HasilPanen::create($data);
        return redirect()->route('hasil-panen.index')->with('success', 'Data Hasil Panen berhasil ditambahkan.');
    }

    public function edit(HasilPanen $hasilPanen)
    {
        $petanis = Petani::all();
        return view('admin.hasil-panen.edit', compact('hasilPanen', 'petanis'));
    }

    public function update(Request $request, HasilPanen $hasilPanen)
    {
        $data = $request->validate([
            'petani_id' => 'required|exists:petanis,id',
            'name' => 'required',
            'type' => 'nullable',
            'grade' => 'nullable',
            'qty' => 'nullable',
            'price' => 'nullable',
            'image' => 'nullable'
        ]);

        $hasilPanen->update($data);
        return redirect()->route('hasil-panen.index')->with('success', 'Data Hasil Panen berhasil diperbarui.');
    }

    public function destroy(HasilPanen $hasilPanen)
    {
        $hasilPanen->delete();
        return redirect()->route('hasil-panen.index')->with('success', 'Data Hasil Panen berhasil dihapus.');
    }
}
