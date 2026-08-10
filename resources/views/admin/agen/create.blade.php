@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="margin: 0;">Tambah Mitra Agen</h1>
        <a href="{{ route('agen.index') }}" class="btn btn-outline"><i class="ph-bold ph-arrow-left"></i> Kembali</a>
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

        <form action="{{ route('agen.store') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Nama Mitra/Agen <span style="color: #ef4444;">*</span></label>
                <input type="text" name="name" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" required value="{{ old('name') }}">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Tipe Kemitraan</label>
                    <input type="text" name="type" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: Distributor Utama" value="{{ old('type') }}">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Kontak</label>
                    <input type="text" name="contact" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: 08xxxxxxxx" value="{{ old('contact') }}">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Cakupan Area</label>
                    <input type="text" name="coverage" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: Seluruh Jawa Barat" value="{{ old('coverage') }}">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Tahun Bergabung</label>
                    <input type="text" name="joined" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="Contoh: Sejak 2021" value="{{ old('joined') }}">
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Alamat Lengkap</label>
                <textarea name="address" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md); min-height: 80px;">{{ old('address') }}</textarea>
            </div>

            <div style="margin-bottom: 2rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">URL Gambar/Logo Agen</label>
                <input type="text" name="image" class="form-control" style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-color); border-radius: var(--radius-md);" placeholder="https://..." value="{{ old('image') }}">
            </div>

            <button type="submit" class="btn btn-primary"><i class="ph-bold ph-save"></i> Simpan Data</button>
        </form>
    </div>
@endsection
