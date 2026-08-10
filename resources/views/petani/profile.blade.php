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
            <div class="form-group" style="grid-column: 1 / -1; display: flex; flex-direction: column; align-items: center; text-align: center; margin-bottom: 2rem;">
                <label class="form-label" for="image">Foto Profil</label>
                
                <div style="margin-bottom: 1rem; position: relative;">
                    @if($petani && $petani->image)
                        <img id="imagePreview" src="{{ Str::startsWith($petani->image, 'http') ? $petani->image : asset('storage/' . $petani->image) }}" alt="Foto Profil" style="height: 150px; width: 150px; object-fit: cover; border-radius: 50%; border: 4px solid var(--primary-light); box-shadow: var(--shadow-md); background: white;">
                    @else
                        <img id="imagePreview" src="https://ui-avatars.com/api/?name={{ urlencode($petani->name) }}&background=E2E8F0&color=475569&size=150" alt="Foto Profil" style="height: 150px; width: 150px; object-fit: cover; border-radius: 50%; border: 4px solid var(--border-color); box-shadow: var(--shadow-md); background: white;">
                    @endif
                    <label for="image" style="position: absolute; bottom: 0; right: 10px; background: var(--primary); color: white; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: var(--shadow-sm); transition: transform 0.2s;">
                        <i class="ph-bold ph-camera"></i>
                    </label>
                </div>
                
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)" style="display: none;">
                <small style="color: var(--text-muted); display: block; margin-top: 0.5rem;">Format: JPG, PNG, WEBP. Maks: 500KB.</small>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">Nama Lengkap <span style="color: #ef4444;">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $petani->name) }}" required>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="whatsapp">Nomor WhatsApp <span style="color: #ef4444;">*</span></label>
                <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="{{ old('whatsapp', $petani->whatsapp) }}" placeholder="Contoh: 08123456789" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="location">Lokasi / Desa <span style="color: #ef4444;">*</span></label>
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

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.border = '4px solid var(--primary)';
        };
        if(event.target.files[0]){
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection
