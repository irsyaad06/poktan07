<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $petani = auth()->user()->petani()->firstOrCreate(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name, 'role' => 'Anggota Tani']
        );
        return view('petani.profile', compact('petani'));
    }

    public function update(Request $request)
    {
        $petani = auth()->user()->petani()->firstOrCreate(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name, 'role' => 'Anggota Tani']
        );

        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'cert' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:500',
        ], [
            'image.max' => 'Masukkan gambar kurang dari 500kb'
        ]);

        $data = $request->except(['_token', '_method', 'image']);
        
        // Tetap set role sebagai 'Anggota Tani' agar seragam di halaman depan
        $data['role'] = 'Anggota Tani';

        if ($request->hasFile('image')) {
            if ($petani->image && Storage::disk('public')->exists($petani->image)) {
                Storage::disk('public')->delete($petani->image);
            }
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $petani->update($data);
        
        // Update user name as well to keep it in sync
        if ($petani->name !== auth()->user()->name) {
            auth()->user()->update(['name' => $petani->name]);
        }

        return redirect()->route('petani.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
