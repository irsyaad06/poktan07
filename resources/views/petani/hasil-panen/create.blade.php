@extends('admin.layout')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1 style="font-size: 1.5rem; font-weight: 600;">Tambah Hasil Panen</h1>
    <a href="{{ route('petani.hasil-panen.index') }}" class="btn btn-outline">
        <i class="ph-bold ph-arrow-left"></i> Kembali
    </a>
</div>

@if($errors->any())
    <div style="padding: 1rem; background: rgba(239, 68, 68, 0.1); color: #b91c1c; border-radius: var(--radius-md); border: 1px solid #fca5a5; margin-bottom: 1.5rem;">
        <ul style="margin: 0; padding-left: 1.5rem;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-card" style="max-width: 600px;">
    <form action="{{ route('petani.hasil-panen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="name">Nama Produk *</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="price">Harga *</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}" placeholder="Contoh: Rp 20.000 / kg" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Gambar Produk (Maks 500KB)</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
            <small style="color: var(--text-muted); display: block; margin-top: 0.5rem;">Format: JPG, PNG, WEBP. Maks 500KB.</small>
        </div>

        <div class="form-group">
            <label class="form-label" for="desc">Deskripsi Singkat *</label>
            <textarea id="desc" name="desc" class="form-control" rows="4" required>{{ old('desc') }}</textarea>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">
                <i class="ph-bold ph-floppy-disk"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
