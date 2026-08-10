<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use App\Models\HasilPanen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HasilPanenController extends Controller
{
    public function index()
    {
        $petani = auth()->user()->petani;
        if (!$petani) {
            return redirect()->route('petani.dashboard')->with('error', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }
        
        $hasilPanens = $petani->hasilPanens()->latest()->get();
        return view('petani.hasil-panen.index', compact('hasilPanens'));
    }

    public function create()
    {
        $petani = auth()->user()->petani;
        if (!$petani) {
            return redirect()->route('petani.dashboard')->with('error', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }
        
        return view('petani.hasil-panen.create');
    }

    public function store(Request $request)
    {
        $petani = auth()->user()->petani;
        
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'type' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'qty' => 'nullable|string|max:255',
            'price' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:500',
        ], [
            'image.max' => 'Masukkan gambar kurang dari 500kb'
        ]);

        $data = $request->except(['_token', 'image']);
        $data['petani_id'] = $petani->id;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        HasilPanen::create($data);

        return redirect()->route('petani.hasil-panen.index')->with('success', 'Hasil Panen berhasil ditambahkan.');
    }

    public function edit(HasilPanen $hasilPanen)
    {
        $petani = auth()->user()->petani;
        
        if ($hasilPanen->petani_id !== $petani->id) {
            abort(403, 'Akses ditolak.');
        }

        return view('petani.hasil-panen.edit', compact('hasilPanen'));
    }

    public function update(Request $request, HasilPanen $hasilPanen)
    {
        $petani = auth()->user()->petani;
        
        if ($hasilPanen->petani_id !== $petani->id) {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'type' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'qty' => 'nullable|string|max:255',
            'price' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:500',
        ], [
            'image.max' => 'Masukkan gambar kurang dari 500kb'
        ]);

        $data = $request->except(['_token', '_method', 'image']);

        if ($request->hasFile('image')) {
            if ($hasilPanen->image && Storage::disk('public')->exists($hasilPanen->image)) {
                Storage::disk('public')->delete($hasilPanen->image);
            }
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $hasilPanen->update($data);

        return redirect()->route('petani.hasil-panen.index')->with('success', 'Hasil Panen berhasil diperbarui.');
    }

    public function destroy(HasilPanen $hasilPanen)
    {
        $petani = auth()->user()->petani;
        
        if ($hasilPanen->petani_id !== $petani->id) {
            abort(403, 'Akses ditolak.');
        }

        if ($hasilPanen->image && Storage::disk('public')->exists($hasilPanen->image)) {
            Storage::disk('public')->delete($hasilPanen->image);
        }
        
        $hasilPanen->delete();
        
        return back()->with('success', 'Hasil Panen berhasil dihapus.');
    }
}
