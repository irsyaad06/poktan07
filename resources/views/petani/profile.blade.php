@extends('admin.layout')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1 style="font-size: 1.5rem; font-weight: 600;">Profil Saya</h1>
</div>

@if(session('success'))
    <div style="padding: 1rem; background: rgba(34, 197, 94, 0.1); color: var(--primary-dark); border-radius: var(--radius-md); border: 1px solid var(--primary-light); margin-bottom: 1.5rem;">
        <i class="ph-bold ph-check-circle"></i> {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div style="padding: 1rem; background: rgba(239, 68, 68, 0.1); color: #b91c1c; border-radius: var(--radius-md); border: 1px solid #fca5a5; margin-bottom: 1.5rem;">
        <ul style="margin: 0; padding-left: 1.5rem;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-card" style="max-width: 800px;">
    <form action="{{ route('petani.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group" style="grid-column: 1 / -1;">
                <label class="form-label" for="image">Foto Profil (Maks 500KB)</label>
                @if($petani && $petani->image)
                    <div style="margin-bottom: 1rem;">
                        <img src="{{ Str::startsWith($petani->image, 'http') ? $petani->image : asset('storage/' . $petani->image) }}" alt="Foto Profil" style="height: 150px; width: 150px; object-fit: cover; border-radius: var(--radius-lg); border: 1px solid var(--border-color);">
                    </div>
                @endif
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                <small style="color: var(--text-muted); display: block; margin-top: 0.5rem;">Format yang didukung: JPG, PNG, WEBP. Maksimal ukuran 500KB.</small>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">Nama Lengkap *</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $petani->name) }}" required>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="whatsapp">Nomor WhatsApp *</label>
                <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="{{ old('whatsapp', $petani->whatsapp) }}" placeholder="Contoh: 08123456789" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="location">Lokasi / Desa *</label>
                <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $petani->location) }}" placeholder="Contoh: Desa Makmur" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="area">Luas Lahan</label>
                <input type="text" id="area" name="area" class="form-control" value="{{ old('area', $petani->area) }}" placeholder="Contoh: 2 Hektar">
            </div>
            
            <div class="form-group" style="grid-column: 1 / -1;">
                <label class="form-label" for="cert">Sertifikasi / Spesialisasi</label>
                <input type="text" id="cert" name="cert" class="form-control" value="{{ old('cert', $petani->cert) }}" placeholder="Contoh: Petani Organik Bersertifikat">
            </div>

            <div class="form-group" style="grid-column: 1 / -1;">
                <label class="form-label" for="desc">Deskripsi Singkat</label>
                <textarea id="desc" name="desc" class="form-control" rows="4" placeholder="Ceritakan sedikit tentang Anda dan lahan Anda...">{{ old('desc', $petani->desc) }}</textarea>
            </div>
        </div>

        <div style="margin-top: 2rem; display: flex; justify-content: flex-end;">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">
                <i class="ph-bold ph-floppy-disk"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
