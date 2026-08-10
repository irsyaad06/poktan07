@extends('admin.layout')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1 style="font-size: 1.5rem; font-weight: 600;">Hasil Panen Saya</h1>
    <a href="{{ route('petani.hasil-panen.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem;">
        <i class="ph-bold ph-plus"></i> Tambah Hasil Panen
    </a>
</div>

@if(session('success'))
    <div style="padding: 1rem; background: rgba(34, 197, 94, 0.1); color: var(--primary-dark); border-radius: var(--radius-md); border: 1px solid var(--primary-light); margin-bottom: 1.5rem;">
        <i class="ph-bold ph-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="admin-card">
    <table class="table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hasilPanens as $item)
                <tr>
                    <td>
                        @if($item->image)
                            <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" style="height: 50px; width: 50px; object-fit: cover; border-radius: var(--radius-sm);">
                        @else
                            <div style="height: 50px; width: 50px; background: var(--bg-main); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                                <i class="ph-duotone ph-image"></i>
                            </div>
                        @endif
                    </td>
                    <td style="font-weight: 500;">{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('petani.hasil-panen.edit', $item->id) }}" class="btn btn-outline" style="padding: 0.4rem 0.8rem;">
                                <i class="ph-bold ph-pencil-simple"></i>
                            </a>
                            <form action="{{ route('petani.hasil-panen.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus hasil panen ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 0.4rem 0.8rem;">
                                    <i class="ph-bold ph-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 2rem;">
                        Belum ada data hasil panen.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
