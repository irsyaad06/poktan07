@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="margin: 0;">Edit Hasil Panen</h1>
        <a href="{{ route('hasil-panen.index') }}" class="btn btn-outline"><i class="ph-bold ph-arrow-left"></i> Kembali</a>
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

        <form action="{{ route('hasil-panen.update', $hasilPanen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Pilih Petani <span style="color: #ef4444;">*</span></label>
                <select name="petani_id" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" required>
                    <option value="">-- Pilih Petani --</option>
                    @foreach($petanis as $petani)
                        <option value="{{ $petani->id }}" {{ old('petani_id', $hasilPanen->petani_id) == $petani->id ? 'selected' : '' }}>{{ $petani->name }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Nama Produk <span style="color: #ef4444;">*</span></label>
                <input type="text" name="name" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" required value="{{ old('name', $hasilPanen->name) }}">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Tipe / Metode Tanam</label>
                    <input type="text" name="type" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: Hidroponik" value="{{ old('type', $hasilPanen->type) }}">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Grade / Kualitas</label>
                    <input type="text" name="grade" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: Grade A" value="{{ old('grade', $hasilPanen->grade) }}">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Harga</label>
                    <input type="text" name="price" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: Rp 20.000 / Kg" value="{{ old('price', $hasilPanen->price) }}">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Kuantitas / Stok</label>
                    <input type="text" name="qty" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: 100 Kg" value="{{ old('qty', $hasilPanen->qty) }}">
                </div>
            </div>

            <div style="margin-bottom: 2rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Gambar Produk (Opsional)</label>
                @if($hasilPanen->image)
                    <div style="margin-bottom: 1rem;">
                        <img src="{{ str_starts_with($hasilPanen->image, 'http') ? $hasilPanen->image : asset('storage/' . $hasilPanen->image) }}" alt="Gambar Saat Ini" style="max-width: 150px; border-radius: 8px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);">
                <small style="color: var(--text-muted); display: block; margin-top: 0.5rem;">Biarkan kosong jika tidak ingin mengubah gambar. (Maksimal 500KB)</small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="ph-bold ph-save"></i> Perbarui Data</button>
        </form>
    </div>
@endsection
