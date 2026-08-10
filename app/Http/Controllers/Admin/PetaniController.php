<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Petani;

class PetaniController extends Controller
{
    public function index()
    {
        $petanis = Petani::latest()->get();
        return view('admin.petani.index', compact('petanis'));
    }

    public function create()
    {
        return view('admin.petani.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'whatsapp' => 'nullable',
            'location' => 'nullable',
            'area' => 'nullable',
            'cert' => 'nullable',
            'desc' => 'nullable',
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

        Petani::create($data);
        return redirect()->route('petani.index')->with('success', 'Data Petani berhasil ditambahkan.');
    }

    public function edit(Petani $petani)
    {
        return view('admin.petani.edit', compact('petani'));
    }

    public function update(Request $request, Petani $petani)
    {
        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'whatsapp' => 'nullable',
            'location' => 'nullable',
            'area' => 'nullable',
            'cert' => 'nullable',
            'desc' => 'nullable',
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

        $petani->update($data);
        return redirect()->route('petani.index')->with('success', 'Data Petani berhasil diperbarui.');
    }

    public function destroy(Petani $petani)
    {
        $petani->delete();
        return redirect()->route('petani.index')->with('success', 'Data Petani berhasil dihapus.');
    }
}
