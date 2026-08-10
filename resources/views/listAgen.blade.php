<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaringan Kemitraan - Polang 07</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar scrolled" id="navbar">
        <a href="/" class="logo">
            <i class="ph-fill ph-plant"></i> Polang<span>07</span>
        </a>
        <ul class="nav-links">
            <li><a href="/">Beranda</a></li>
            <li><a href="/#kegiatan">Kegiatan</a></li>
            <li><a href="/list-agen" class="active">Kemitraan Agen</a></li>
            <li><a href="/#petani" class="btn btn-glow">Daftar Petani</a></li>
        </ul>
    </nav>

    <!-- Header -->
    <header class="page-header">
        <span class="hero-tag" style="background: var(--bg-surface);"><i class="ph-fill ph-handshake"></i> Relasi Bisnis Terpercaya</span>
        <h1 class="page-title">Jaringan Mitra Resmi</h1>
        <p style="color: var(--text-muted); max-width: 600px; margin: 1rem auto 0; font-size: 1.1rem;">
            Daftar distributor dan agen terverifikasi skala regional hingga nasional yang dipercaya untuk menyalurkan komoditas unggulan Polang 07.
        </p>
    </header>

    <!-- List Agen Section -->
    <section class="section bg-main">
        <div class="grid" id="agen-grid">
            @if(count($agens) === 0)
                <div class="empty-state">
                    <i class="ph-duotone ph-users"></i>
                    <h3>Belum Ada Mitra Terdaftar</h3>
                    <p>Sistem kami sedang memperbarui daftar kemitraan agen resmi saat ini.</p>
                </div>
            @else
                @foreach($agens as $index => $agen)
                @php
                    $waNumber = '62' . ltrim(preg_replace('/[^0-9]/', '', $agen->contact), '0');
                @endphp
                <div class="card animate-on-scroll" style="animation-delay: {{ ($index % 3) * 150 }}ms;">
                    <div class="card-img-wrap" style="height: 220px;">
                        <span class="badge" style="background: var(--accent); color: white; left: 1rem; right: auto;">
                            {{ $agen->type }}
                        </span>
                        <span class="badge" style="background: rgba(255, 255, 255, 0.95); color: var(--text-main);">
                            <i class="ph-fill ph-shield-check" style="color: var(--primary);"></i> Verified
                        </span>
                        <img src="{{ $agen->image }}" alt="{{ $agen->name }}" class="card-img">
                    </div>
                    <div class="card-content">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <h3 class="card-title" style="margin: 0; font-size: 1.3rem;">{{ $agen->name }}</h3>
                        </div>
                        
                        <div style="display: flex; flex-direction: column; gap: 0.8rem; margin-bottom: 1.5rem; background: var(--bg-main); padding: 1rem; border-radius: var(--radius-md);">
                            
                            <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                                <i class="ph-fill ph-map-pin" style="color: var(--primary); font-size: 1.2rem; margin-top: 0.1rem;"></i>
                                <div style="display: flex; flex-direction: column;">
                                    <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-light); font-weight: 600;">Area Cakupan</span>
                                    <span style="color: var(--text-main); font-weight: 500; font-size: 0.95rem;">{{ $agen->coverage }}</span>
                                </div>
                            </div>

                            <div style="height: 1px; background: var(--border-color); width: 100%;"></div>

                            <div style="display: flex; align-items: flex-start; gap: 0.75rem;">
                                <i class="ph-fill ph-buildings" style="color: var(--primary); font-size: 1.2rem; margin-top: 0.1rem;"></i>
                                <div style="display: flex; flex-direction: column;">
                                    <span style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-light); font-weight: 600;">Alamat Distribusi</span>
                                    <span style="color: var(--text-muted); font-size: 0.9rem;">{{ $agen->address }}</span>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer" style="padding-top: 1rem; border-top: none; display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; font-size: 0.85rem; color: var(--text-muted);">
                                <span><i class="ph-fill ph-calendar-blank"></i> {{ $agen->joined }}</span>
                                @if($agen->id !== 1)
                                    <span><i class="ph-fill ph-phone"></i> {{ $agen->contact }}</span>
                                @endif
                            </div>
                            @if($agen->id !== 1)
                                <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="btn btn-primary" style="width: 100%; background: #25D366; box-shadow: 0 4px 14px 0 rgba(37, 211, 102, 0.39);">
                                    <i class="ph-fill ph-whatsapp-logo" style="font-size: 1.2rem;"></i> Hubungi Agen
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <a href="/" class="logo">
                    <i class="ph-fill ph-plant"></i> Polang<span>07</span>
                </a>
                <p>Memberdayakan petani lokal melalui praktik pertanian modern dan berkelanjutan untuk hasil panen yang optimal.</p>
            </div>
            <div class="footer-links">
                <h4 style="margin-bottom: 1rem; color: var(--text-main);">Tautan Cepat</h4>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.5rem;">
                    <li><a href="/" style="color: var(--text-muted); text-decoration: none;">Beranda</a></li>
                    <li><a href="/#petani" style="color: var(--text-muted); text-decoration: none;">Petani Kami</a></li>
                    <li><a href="/list-agen" style="color: var(--text-muted); text-decoration: none;">Mitra Agen</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Polang 07. Seluruh Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Intersection Observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
