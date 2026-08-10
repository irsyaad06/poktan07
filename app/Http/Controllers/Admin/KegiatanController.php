<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kegiatan;

class KegiatanController extends Controller
{


    public function index()
    {
        $kegiatans = Kegiatan::latest()->get();
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'date' => 'nullable',
            'desc' => 'nullable',
            'image' => 'nullable'
        ]);

        Kegiatan::create($data);
        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $data = $request->validate([
            'title' => 'required',
            'date' => 'nullable',
            'desc' => 'nullable',
            'image' => 'nullable'
        ]);

        $kegiatan->update($data);
        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan berhasil dihapus.');
    }
}
