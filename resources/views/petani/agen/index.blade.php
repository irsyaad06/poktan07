@extends('admin.layout')

@section('content')
<div style="margin-bottom: 2rem;">
    <h1 style="font-size: 1.5rem; font-weight: 600;">Mitra Agen</h1>
    <p style="color: var(--text-muted); margin-top: 0.5rem;">Daftar distributor dan agen terverifikasi yang bekerja sama dengan Poktan 07.</p>
</div>

<div class="grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
    @foreach($agens as $agen)
    @php
        $waNumber = '62' . ltrim(preg_replace('/[^0-9]/', '', $agen->contact), '0');
    @endphp
    <div class="admin-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
        <div style="height: 180px; position: relative;">
            <span class="badge" style="position: absolute; top: 1rem; left: 1rem; background: var(--accent); color: white; padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.75rem; font-weight: 600; z-index: 10;">
                {{ $agen->type }}
            </span>
            <img src="{{ str_starts_with($agen->image, 'http') ? $agen->image : asset('storage/' . $agen->image) }}" alt="{{ $agen->name }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
            <h3 style="margin: 0 0 1rem; font-size: 1.2rem;">{{ $agen->name }}</h3>
            
            <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 1.5rem;">
                <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                    <i class="ph-fill ph-map-pin" style="color: var(--primary); font-size: 1.2rem;"></i>
                    <div style="display: flex; flex-direction: column;">
                        <span style="font-size: 0.75rem; text-transform: uppercase; color: var(--text-light); font-weight: 600;">Area Cakupan</span>
                        <span style="color: var(--text-main); font-weight: 500; font-size: 0.9rem;">{{ $agen->coverage }}</span>
                    </div>
                </div>
                <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                    <i class="ph-fill ph-buildings" style="color: var(--primary); font-size: 1.2rem;"></i>
                    <div style="display: flex; flex-direction: column;">
                        <span style="font-size: 0.75rem; text-transform: uppercase; color: var(--text-light); font-weight: 600;">Alamat</span>
                        <span style="color: var(--text-muted); font-size: 0.85rem;">{{ $agen->address }}</span>
                    </div>
                </div>
                <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                    <i class="ph-fill ph-phone" style="color: var(--primary); font-size: 1.2rem;"></i>
                    <div style="display: flex; flex-direction: column;">
                        <span style="font-size: 0.75rem; text-transform: uppercase; color: var(--text-light); font-weight: 600;">Kontak</span>
                        <span style="color: var(--text-main); font-weight: 500; font-size: 0.9rem;">{{ $agen->contact }}</span>
                    </div>
                </div>
            </div>

            <div style="margin-top: auto;">
                @php
                    $petani = auth()->user()->petani;
                    $pesan = "Halo, saya " . ($petani ? $petani->name : 'Petani Poktan 07') . 
                             ($petani && $petani->location ? " dari daerah " . $petani->location : "") . 
                             ". Saya mendapatkan kontak Anda dari platform Poktan 07 dan tertarik untuk menawarkan hasil panen saya/kelompok tani kami. Apakah kita bisa berdiskusi lebih lanjut mengenai peluang kerja sama atau penyaluran hasil panen?";
                @endphp
                <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($pesan) }}" target="_blank" class="btn btn-primary" style="width: 100%; background: #25D366; box-shadow: 0 4px 14px 0 rgba(37, 211, 102, 0.39); justify-content: center;">
                    <i class="ph-fill ph-whatsapp-logo" style="font-size: 1.2rem;"></i> Hubungi Agen
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
