@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="margin: 0;">Edit Kegiatan</h1>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-outline"><i class="ph-bold ph-arrow-left"></i> Kembali</a>
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

        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Judul Kegiatan <span style="color: #ef4444;">*</span></label>
                <input type="text" name="title" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" required value="{{ old('title', $kegiatan->title) }}">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Tanggal Kegiatan</label>
                <input type="text" name="date" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: 12 Agustus 2024" value="{{ old('date', $kegiatan->date) }}">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Deskripsi</label>
                <textarea name="desc" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); min-height: 100px;">{{ old('desc', $kegiatan->desc) }}</textarea>
            </div>

            <div style="margin-bottom: 2rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Gambar Dokumentasi (Opsional)</label>
                @if($kegiatan->image)
                    <div style="margin-bottom: 1rem;">
                        <img src="{{ str_starts_with($kegiatan->image, 'http') ? $kegiatan->image : asset('storage/' . $kegiatan->image) }}" alt="Gambar Saat Ini" style="max-width: 150px; border-radius: 8px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);">
                <small style="color: var(--text-muted); display: block; margin-top: 0.5rem;">Biarkan kosong jika tidak ingin mengubah gambar. (Maksimal 500KB)</small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="ph-bold ph-save"></i> Perbarui Data</button>
        </form>
    </div>
@endsection
