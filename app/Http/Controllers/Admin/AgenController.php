<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Agen;

class AgenController extends Controller
{


    public function index()
    {
        $agens = Agen::latest()->get();
        return view('admin.agen.index', compact('agens'));
    }

    public function create()
    {
        return view('admin.agen.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'nullable',
            'contact' => 'nullable',
            'coverage' => 'nullable',
            'address' => 'nullable',
            'joined' => 'nullable',
            'image' => 'nullable|image|max:500'
        ], [
            'image.max' => 'masukkan gambar kurang dari 500kb',
            'image.image' => 'File harus berupa gambar.'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        } else {
            unset($data['image']);
        }

        Agen::create($data);
        return redirect()->route('agen.index')->with('success', 'Data Agen berhasil ditambahkan.');
    }

    public function edit(Agen $agen)
    {
        return view('admin.agen.edit', compact('agen'));
    }

    public function update(Request $request, Agen $agen)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'nullable',
            'contact' => 'nullable',
            'coverage' => 'nullable',
            'address' => 'nullable',
            'joined' => 'nullable',
            'image' => 'nullable|image|max:500'
        ], [
            'image.max' => 'masukkan gambar kurang dari 500kb',
            'image.image' => 'File harus berupa gambar.'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        } else {
            unset($data['image']);
        }

        $agen->update($data);
        return redirect()->route('agen.index')->with('success', 'Data Agen berhasil diperbarui.');
    }

    public function destroy(Agen $agen)
    {
        $agen->delete();
        return redirect()->route('agen.index')->with('success', 'Data Agen berhasil dihapus.');
    }
}
