@extends('admin.layout')

@section('content')
    <h1 style="margin-bottom: 2rem;">Dashboard Utama</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
        
        <div class="admin-card" style="display: flex; align-items: center; gap: 1rem;">
            <div style="width: 50px; height: 50px; border-radius: var(--radius-md); background: var(--primary-light); color: var(--primary-dark); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="ph-fill ph-users"></i>
            </div>
            <div>
                <h3 style="margin: 0; font-size: 1.5rem;">{{ $petaniCount }}</h3>
                <span style="color: var(--text-muted); font-size: 0.9rem;">Total Petani</span>
            </div>
        </div>

        <div class="admin-card" style="display: flex; align-items: center; gap: 1rem;">
            <div style="width: 50px; height: 50px; border-radius: var(--radius-md); background: var(--accent-light); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="ph-fill ph-basket"></i>
            </div>
            <div>
                <h3 style="margin: 0; font-size: 1.5rem;">{{ $panenCount }}</h3>
                <span style="color: var(--text-muted); font-size: 0.9rem;">Hasil Panen</span>
            </div>
        </div>

        <div class="admin-card" style="display: flex; align-items: center; gap: 1rem;">
            <div style="width: 50px; height: 50px; border-radius: var(--radius-md); background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="ph-fill ph-handshake"></i>
            </div>
            <div>
                <h3 style="margin: 0; font-size: 1.5rem;">{{ $agenCount }}</h3>
                <span style="color: var(--text-muted); font-size: 0.9rem;">Mitra Agen</span>
            </div>
        </div>

        <div class="admin-card" style="display: flex; align-items: center; gap: 1rem;">
            <div style="width: 50px; height: 50px; border-radius: var(--radius-md); background: #fef08a; color: #a16207; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                <i class="ph-fill ph-calendar"></i>
            </div>
            <div>
                <h3 style="margin: 0; font-size: 1.5rem;">{{ $kegiatanCount }}</h3>
                <span style="color: var(--text-muted); font-size: 0.9rem;">Kegiatan</span>
            </div>
        </div>

    </div>

    <div class="admin-card">
        <h3 style="margin-bottom: 1.5rem; margin-top: 0;">Petani Terbaru</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Spesialisasi</th>
                    <th>Lokasi</th>
                    <th>WhatsApp</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestPetanis as $p)
                <tr>
                    <td style="font-weight: 500;">{{ $p->name }}</td>
                    <td>{{ $p->role }}</td>
                    <td>{{ $p->location }}</td>
                    <td>{{ $p->whatsapp }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($latestPetanis) === 0)
            <p style="text-align: center; color: var(--text-muted); padding: 1rem;">Belum ada data petani.</p>
        @endif
    </div>
@endsection
