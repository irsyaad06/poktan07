<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Hasil Tani - Polang 07</title>
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
            <li><a href="/list-agen">Kemitraan Agen</a></li>
            <li><a href="/#petani" class="btn btn-glow">Daftar Petani</a></li>
        </ul>
    </nav>

    <!-- Header Petani -->
    <header class="page-header" id="petani-header">
        @if(!$petani)
            <h1 class="page-title">Data Tidak Ditemukan</h1>
            <p style="margin-bottom: 2rem; color: var(--text-muted);">Maaf, profil petani yang Anda cari tidak tersedia dalam sistem kami.</p>
            <a href="/" class="btn btn-primary"><i class="ph-bold ph-arrow-left"></i> Kembali ke Beranda</a>
        @else
            @php
                $waNumber = ltrim(preg_replace('/[^0-9]/', '', $petani->whatsapp), '0');
                if (substr($waNumber, 0, 2) !== '62') {
                    $waNumber = '62' . $waNumber;
                }
                $profileMessage = "Halo {$petani->name}, saya tertarik dengan hasil panen Anda dari Polang 07.";
                $profileWaUrl = "https://wa.me/{$waNumber}?text=" . urlencode($profileMessage);
            @endphp
            <div class="petani-profile animate-on-scroll is-visible">
                <img src="{{ str_starts_with($petani->image, 'http') ? $petani->image : asset('storage/' . $petani->image) }}" alt="{{ $petani->name }}" class="profile-avatar" style="border-color: var(--primary-light);">
                <h1 class="page-title">{{ $petani->name }}</h1>
                
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 1rem; margin-bottom: 1.5rem;">
                    <span class="badge" style="position: relative; top: 0; right: 0; background: var(--primary); color: white;">
                        <i class="ph-fill ph-plant"></i> {{ $petani->role }}
                    </span>
                    <span class="badge" style="position: relative; top: 0; right: 0; background: var(--bg-surface); color: var(--text-main); border: 1px solid var(--border-color);">
                        <i class="ph-fill ph-certificate" style="color: var(--accent);"></i> {{ $petani->cert }}
                    </span>
                    <span class="badge" style="position: relative; top: 0; right: 0; background: var(--bg-surface); color: var(--text-main); border: 1px solid var(--border-color);">
                        <i class="ph-fill ph-bounding-box" style="color: var(--primary);"></i> {{ $petani->area }}
                    </span>
                    <span class="badge" style="position: relative; top: 0; right: 0; background: var(--bg-surface); color: var(--text-main); border: 1px solid var(--border-color);">
                        <i class="ph-fill ph-whatsapp-logo" style="color: #25D366;"></i> {{ $petani->whatsapp }}
                    </span>
                </div>

                <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; line-height: 1.6; margin-bottom: 1.5rem;">
                    "{{ $petani->desc }}"
                </p>

                <a href="{{ $profileWaUrl }}" target="_blank" class="btn btn-primary" style="background: #25D366; box-shadow: 0 4px 14px 0 rgba(37, 211, 102, 0.39); display: inline-flex; align-items: center; gap: 0.5rem;">
                    <i class="ph-fill ph-whatsapp-logo" style="font-size: 1.2rem;"></i> Beli via WhatsApp
                </a>
            </div>
        @endif
    </header>

    <!-- Hasil Panen Section -->
    <section class="section">
        <div class="section-header">
            <h2>Katalog Produk</h2>
            <p>Daftar lengkap komoditas agrikultur berkualitas tinggi yang dikelola dengan standar mutu terbaik.</p>
        </div>
        <div class="grid" id="panen-grid">
            @if($petani && count($petani->hasilPanens) > 0)
                @foreach($petani->hasilPanens as $index => $item)
                    @php
                        $typeColor = "var(--primary)";
                        if($item->type === "Konvensional") $typeColor = "var(--text-muted)";
                        else if($item->type === "Hidroponik") $typeColor = "#0284c7";
                    @endphp
                    <div class="card animate-on-scroll is-visible" style="animation-delay: {{ ($index % 3) * 150 }}ms;">
                        <div class="card-img-wrap" style="height: 240px;">
                            <span class="badge" style="background: {{ $typeColor }}; color: white; left: 1rem; right: auto;">
                                {{ $item->type }}
                            </span>
                            <span class="badge" style="background: var(--accent); color: white;">
                                <i class="ph-fill ph-star"></i> {{ $item->grade }}
                            </span>
                            <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="card-img">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title" style="font-size: 1.25rem;">{{ $item->name }}</h3>
                            
                            <div style="margin: 1rem 0; display: flex; justify-content: center; align-items: center; background: var(--bg-main); padding: 0.75rem; border-radius: var(--radius-md);">
                                <div style="display: flex; flex-direction: column; text-align: center;">
                                    <span style="font-size: 0.8rem; color: var(--text-light); text-transform: uppercase; font-weight: 600; letter-spacing: 0.05em;">Harga</span>
                                    <span class="product-price">{{ $item->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif($petani)
                <div class="empty-state">
                    <i class="ph-duotone ph-basket"></i>
                    <h3>Belum Ada Produk</h3>
                    <p>Petani ini sedang dalam masa tanam atau belum mencatat hasil panen terbaru dalam sistem.</p>
                </div>
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
                <p>Memberdayakan petani lokal melalui praktik pertanian modern dan berkelanjutan untuk hasil panen yang optimal dan sehat.</p>
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
