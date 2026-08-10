@extends('admin.layout')

@section('content')
<div style="margin-bottom: 2rem;">
    <h1 style="font-size: 1.5rem; font-weight: 600;">Dashboard Petani</h1>
    <p style="color: var(--text-muted); margin-top: 0.5rem;">Selamat datang, {{ auth()->user()->name }}!</p>
</div>

@if(!$petani || !$petani->whatsapp || !$petani->location)
    <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid #fca5a5; color: #b91c1c; padding: 1.5rem; border-radius: var(--radius-md); margin-bottom: 2rem; display: flex; align-items: flex-start; gap: 1rem;">
        <i class="ph-bold ph-warning-circle" style="font-size: 1.5rem; margin-top: 0.1rem;"></i>
        <div>
            <h3 style="font-weight: 600; margin-bottom: 0.5rem; color: #991b1b;">Lengkapi Profil Anda</h3>
            <p style="margin: 0;">Data profil Anda belum lengkap. Silakan lengkapi nomor WhatsApp, lokasi, dan deskripsi agar profil Anda dapat tampil dengan baik di halaman utama.</p>
            <a href="{{ route('petani.profile') }}" class="btn btn-primary" style="margin-top: 1rem; padding: 0.5rem 1rem; font-size: 0.9rem;">Lengkapi Sekarang</a>
        </div>
    </div>
@endif

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
    <div class="admin-card" style="padding: 1.5rem; display: flex; align-items: center; gap: 1.5rem;">
        <div style="background: rgba(34, 197, 94, 0.1); color: var(--primary); width: 64px; height: 64px; border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; font-size: 2rem;">
            <i class="ph-duotone ph-basket"></i>
        </div>
        <div>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin: 0 0 0.5rem 0; font-weight: 500;">Total Hasil Panen Saya</p>
            <h3 style="font-size: 2rem; font-weight: 700; margin: 0; color: var(--text-main);">{{ $totalHasilPanen }}</h3>
        </div>
    </div>
</div>
@endsection
