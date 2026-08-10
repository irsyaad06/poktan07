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

@if(count($hasilPanens) > 0)
    <div class="grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
        @foreach($hasilPanens as $item)
            <div class="admin-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                <div style="height: 180px; position: relative;">
                    @if($item->image)
                        <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <div style="width: 100%; height: 100%; background: var(--bg-main); display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                            <i class="ph-duotone ph-image" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <span style="position: absolute; top: 1rem; right: 1rem; background: rgba(255, 255, 255, 0.95); padding: 0.4rem 0.8rem; border-radius: 99px; font-size: 0.85rem; font-weight: 700; color: var(--primary-dark); box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                        {{ is_numeric($item->price) ? 'Rp ' . number_format($item->price, 0, ',', '.') : (str_contains(strtolower($item->price), 'rp') ? $item->price : 'Rp ' . $item->price) }}
                    </span>
                    @if($item->grade)
                        <span style="position: absolute; top: 1rem; left: 1rem; background: var(--accent); color: white; padding: 0.25rem 0.6rem; border-radius: var(--radius-sm); font-size: 0.75rem; font-weight: 600;">
                            Grade: {{ $item->grade }}
                        </span>
                    @endif
                </div>
                
                <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem;">
                        <h3 style="margin: 0; font-size: 1.2rem; font-weight: 600; color: var(--text-main);">{{ $item->name }}</h3>
                        @if($item->qty)
                            <span style="font-size: 0.8rem; color: var(--text-muted); background: var(--bg-main); padding: 0.2rem 0.5rem; border-radius: var(--radius-sm);">
                                Stok: {{ $item->qty }}
                            </span>
                        @endif
                    </div>
                    
                    @if($item->type)
                        <span style="font-size: 0.8rem; color: var(--primary); margin-bottom: 0.5rem;">
                            Metode: {{ $item->type }}
                        </span>
                    @endif

                    @if($item->desc)
                        <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 0.5rem; margin-bottom: 1.5rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.5;">
                            {{ $item->desc }}
                        </p>
                    @endif
                    
                    <div style="margin-top: auto; display: flex; gap: 0.75rem; border-top: 1px solid var(--border-color); padding-top: 1.25rem;">
                        <a href="{{ route('petani.hasil-panen.edit', $item->id) }}" class="btn btn-outline" style="flex: 1; justify-content: center; padding: 0.6rem;">
                            Ubah
                        </a>
                        <form action="{{ route('petani.hasil-panen.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" style="flex: 1; display: flex;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="width: 100%; justify-content: center; padding: 0.6rem; gap: 0.4rem; background: #fee2e2; color: #dc2626; border-color: transparent;">
                                <i class="ph-bold ph-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="admin-card" style="text-align: center; padding: 4rem 2rem;">
        <i class="ph-duotone ph-basket" style="font-size: 4rem; color: var(--text-light); margin-bottom: 1rem;"></i>
        <h3 style="margin-bottom: 0.5rem; font-size: 1.3rem;">Belum ada hasil panen</h3>
        <p style="color: var(--text-muted); margin-bottom: 2rem;">Anda belum mencatat hasil panen apapun ke dalam sistem.</p>
        <a href="{{ route('petani.hasil-panen.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem;">
            <i class="ph-bold ph-plus"></i> Tambah Produk Pertama Anda
        </a>
    </div>
@endif
@endsection
