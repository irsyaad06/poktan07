@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="margin: 0;">Tambah Petani</h1>
        <a href="{{ route('petani.index') }}" class="btn btn-outline"><i class="ph-bold ph-arrow-left"></i> Kembali</a>
    </div>

    <div class="admin-card" style="max-width: 800px;">
        @if ($errors->any())
            <div style="background: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1.5rem; border: 1px solid #f87171;">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('petani.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Nama Petani <span style="color: #ef4444;">*</span></label>
                <input type="text" name="name" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" required value="{{ old('name') }}">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Spesialisasi / Peran <span style="color: #ef4444;">*</span></label>
                <input type="text" name="role" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: Petani Hidroponik" required value="{{ old('role') }}">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Lokasi</label>
                    <input type="text" name="location" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Desa atau Kecamatan" value="{{ old('location') }}">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Luas Lahan (Area)</label>
                    <input type="text" name="area" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: 2 Hektar" value="{{ old('area') }}">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Sertifikasi / Badge</label>
                    <input type="text" name="cert" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: GAP Certified" value="{{ old('cert') }}">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="08xxxxxxxxxx" value="{{ old('whatsapp') }}">
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Deskripsi</label>
                <textarea name="desc" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); min-height: 100px;">{{ old('desc') }}</textarea>
            </div>

            <div style="margin-bottom: 2rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Gambar Profil</label>
                <input type="file" name="image" class="form-control" accept="image/*" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);">
                <small style="color: var(--text-muted); display: block; margin-top: 0.5rem;">Pilih file gambar (Maksimal 500KB).</small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="ph-bold ph-save"></i> Simpan Data</button>
        </form>
    </div>
@endsection
