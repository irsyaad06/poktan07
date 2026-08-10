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

<div class="admin-card" style="max-width: 800px;">
    <form action="{{ route('petani.hasil-panen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="name">Nama Produk <span style="color: #ef4444;">*</span></label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Tomat Ceri" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="type">Tipe / Metode Tanam</label>
                <input type="text" id="type" name="type" class="form-control" value="{{ old('type') }}" placeholder="Contoh: Hidroponik">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="grade">Grade / Kualitas</label>
                <input type="text" id="grade" name="grade" class="form-control" value="{{ old('grade') }}" placeholder="Contoh: Grade A">
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="price">Harga <span style="color: #ef4444;">*</span></label>
                <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}" placeholder="Contoh: Rp 20.000 / kg" required>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label" for="qty">Kuantitas / Stok</label>
                <input type="text" id="qty" name="qty" class="form-control" value="{{ old('qty') }}" placeholder="Contoh: 100 kg">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="image">Gambar Produk (Maks 500KB)</label>
            <div style="margin-bottom: 1rem;">
                <img id="imagePreview" src="https://placehold.co/150x150?text=Pilih+Gambar" alt="Preview" style="height: 150px; width: 150px; object-fit: cover; border-radius: var(--radius-md); border: 2px dashed var(--border-color);">
            </div>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
            <small style="color: var(--text-muted); display: block; margin-top: 0.5rem;">Format: JPG, PNG, WEBP. Maks 500KB.</small>
        </div>

        <div class="form-group">
            <label class="form-label" for="desc">Deskripsi Produk <span style="color: #ef4444;">*</span></label>
            <textarea id="desc" name="desc" class="form-control" rows="4" required>{{ old('desc') }}</textarea>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2rem;">
                <i class="ph-bold ph-floppy-disk"></i> Simpan
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.border = '2px solid var(--primary)';
        };
        if(event.target.files[0]){
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection
