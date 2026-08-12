<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poktan 07 - Kelompok Tani Profesional</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <a href="/" class="logo">
            <i class="ph-fill ph-plant"></i> Poktan<span>07</span>
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Buka Menu"><i class="ph-bold ph-list"></i></button>
        <ul class="nav-links" id="navLinks">
            <li><a href="/" class="active">Beranda</a></li>
            <li><a href="#kegiatan">Kegiatan</a></li>
            <li><a href="/list-agen">Kemitraan Agen</a></li>
            @if(auth()->check())
                @if(auth()->user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="btn btn-glow"><i class="ph-bold ph-squares-four"></i> Dashboard Admin</a></li>
                @elseif(auth()->user()->role === 'petani')
                    <li><a href="{{ route('petani.dashboard') }}" class="btn btn-glow"><i class="ph-bold ph-squares-four"></i> Dashboard Petani</a></li>
                @endif
            @else
                <li><a href="#petani" class="btn btn-glow">Daftar Petani</a></li>
            @endif
        </ul>
    </nav>

    <!-- Hero Section -->
    <header class="hero" style="padding-bottom: 10rem;">
        <div class="hero-content">
            <span class="hero-tag"><i class="ph-fill ph-star"></i> Pertanian Lokal Berkualitas</span>
            <h1>Membangun Ekosistem <span>Pertanian Modern</span></h1>
            <p>Poktan 07 berkomitmen untuk menghasilkan produk agrikultur berkualitas tinggi, tersertifikasi, dan berkelanjutan secara langsung dari kebun kami ke tangan Anda.</p>
            <div class="hero-actions">
                <a href="#petani" class="btn btn-primary">Lihat Profil Petani</a>
                <a href="/list-agen" class="btn btn-outline">Mitra Distributor</a>
            </div>
        </div>
    </header>

    <!-- Portal Overlapping Section -->
    <section class="portal-overlap-section">
        <div class="portal-overlap-container animate-on-scroll">

            <!-- Header label -->
            <div class="portal-overlap-header">
                <span class="portal-label"><i class="ph-fill ph-rocket-launch"></i> Mulai Perjalanan Anda</span>
                <h2>Akses Platform Poktan 07</h2>
                <p>Pilih jalur yang sesuai — pelajari panduan sistem kami atau langsung masuk ke portal anggota untuk mengelola aktivitas pertanian Anda.</p>
            </div>

            <!-- Cards Row -->
            <div class="portal-cards-row">

                <!-- Card Panduan -->
                <a href="/panduan" class="portal-card portal-card-guide">
                    <div class="portal-card-icon">
                        <i class="ph-duotone ph-book-open"></i>
                    </div>
                    <div class="portal-card-body">
                        <h3>Pusat Bantuan</h3>
                        <p>Panduan lengkap penggunaan sistem, langkah demi langkah, tersedia untuk semua pengguna baru maupun lama.</p>
                    </div>
                    <span class="portal-card-action btn btn-outline">
                        <i class="ph-bold ph-arrow-right"></i> Pelajari Sekarang
                    </span>
                </a>

                <!-- Divider -->
                <div class="portal-divider"></div>

                <!-- Card Portal / Login -->
                <div class="portal-card portal-card-member">
                    <div class="portal-card-icon portal-card-icon--accent">
                        <i class="ph-duotone ph-users-three"></i>
                    </div>
                    <div class="portal-card-body">
                        <h3>Portal Anggota</h3>
                        <p>Masuk ke dashboard pribadi Anda atau daftar sebagai petani baru untuk mulai bergabung bersama komunitas Poktan 07.</p>
                    </div>
                    <div class="portal-card-btns">
                        <a href="/login" class="btn btn-primary"><i class="ph-bold ph-sign-in"></i> Login Sekarang</a>
                        <a href="/register" class="btn btn-outline"><i class="ph-bold ph-user-plus"></i> Daftar Akun Baru</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Kegiatan Section -->
    <section id="kegiatan" class="section bg-main" style="padding-top: 8rem;">
        <div class="section-header animate-on-scroll">
            <h2>Kegiatan Kelompok Tani</h2>
            <p>Dokumentasi aktivitas dan program pemberdayaan yang dilakukan oleh anggota Poktan 07 untuk meningkatkan kualitas dan produktivitas pertanian.</p>
        </div>
        <div class="grid" id="kegiatan-grid">
            @foreach($kegiatans as $index => $kegiatan)
            <div class="card animate-on-scroll" style="transition-delay: {{ ($index % 3) * 150 }}ms;">
                <div class="card-img-wrap" style="height: 220px;">
                    <span class="badge" style="background: var(--accent); color: white; left: 1rem; right: auto;">
                        <i class="ph-bold ph-calendar-blank"></i> {{ $kegiatan->date }}
                    </span>
                    <img src="{{ str_starts_with($kegiatan->image, 'http') ? $kegiatan->image : asset('storage/' . $kegiatan->image) }}" alt="{{ $kegiatan->title }}" class="card-img">
                </div>
                <div class="card-content">
                    <h3 class="card-title" style="margin-bottom: 0.8rem; font-size: 1.25rem;">{{ $kegiatan->title }}</h3>
                    <p class="card-desc" style="font-size: 0.95rem; line-height: 1.6; color: var(--text-muted); margin-bottom: 0;">
                        {{ $kegiatan->desc }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Daftar Petani Section -->
    <section id="petani" class="section">
        <div class="section-header animate-on-scroll">
            <h2>Keluarga Petani Kami</h2>
            <p>Berkenalan dengan pahlawan pangan lokal kami yang berdedikasi menghasilkan panen terbaik dan telah terverifikasi secara profesional.</p>
            <div style="margin-top: 1.5rem;">
                @if(auth()->check())
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="font-size: 1.1rem; padding: 0.8rem 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                            <i class="ph-bold ph-squares-four"></i> Ke Dashboard Admin
                        </a>
                    @elseif(auth()->user()->role === 'petani')
                        <a href="{{ route('petani.dashboard') }}" class="btn btn-primary" style="font-size: 1.1rem; padding: 0.8rem 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                            <i class="ph-bold ph-squares-four"></i> Ke Dashboard Petani
                        </a>
                    @endif
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary" style="font-size: 1.1rem; padding: 0.8rem 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="ph-bold ph-user-plus"></i> Gabung Kelompok
                    </a>
                @endif
            </div>
        </div>
        <div class="grid" id="petani-grid">
            @foreach($petanis as $index => $petani)
            <div class="card animate-on-scroll" style="transition-delay: {{ ($index % 3) * 150 }}ms;">
                <div class="card-img-wrap" style="height: 260px;">
                    <span class="badge" style="background: var(--primary); color: white;">
                        <i class="ph-fill ph-certificate"></i> {{ $petani->cert }}
                    </span>
                    <img src="{{ str_starts_with($petani->image, 'http') ? $petani->image : asset('storage/' . $petani->image) }}" alt="{{ $petani->name }}" class="card-img">
                </div>
                <div class="card-content">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem;">
                        <h3 class="card-title" style="margin: 0;">{{ $petani->name }}</h3>
                    </div>
                    
                    <div style="display: flex; flex-direction: column; gap: 0.4rem; margin-bottom: 1rem;">
                        <span style="color: var(--primary-dark); font-weight: 600; font-size: 0.9rem;">
                            <i class="ph-fill ph-plant"></i> {{ $petani->role }}
                        </span>
                        <span style="color: var(--text-muted); font-size: 0.85rem;">
                            <i class="ph-fill ph-map-pin"></i> {{ $petani->location }} • <i class="ph-fill ph-bounding-box"></i> {{ $petani->area }} • <i class="ph-fill ph-whatsapp-logo" style="color: #25D366;"></i> {{ $petani->whatsapp }}
                        </span>
                    </div>
                    
                    <p class="card-desc" style="font-size: 0.9rem; line-height: 1.5; color: var(--text-muted); margin-bottom: 1.5rem; display: block;">
                        "{{ $petani->desc }}"
                    </p>
                    
                    <div class="card-footer" style="margin-top: auto; border-top: 1px solid var(--border-color); padding-top: 1.2rem;">
                        <a href="/hasil-panen?id={{ $petani->id }}" class="btn btn-outline" style="width: 100%;">
                            Lihat Hasil Panen <i class="ph-bold ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <a href="/" class="logo">
                    <i class="ph-fill ph-plant"></i> Poktan<span>07</span>
                </a>
                <p>Memberdayakan petani lokal melalui praktik pertanian modern dan berkelanjutan untuk hasil panen yang optimal dan sehat.</p>
            </div>
            <div class="footer-links">
                <h4 style="margin-bottom: 1rem; color: var(--text-main);">Tautan Cepat</h4>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.5rem;">
                    <li><a href="/" style="color: var(--text-muted); text-decoration: none;">Beranda</a></li>
                    <li><a href="#petani" style="color: var(--text-muted); text-decoration: none;">Petani Kami</a></li>
                    <li><a href="/list-agen" style="color: var(--text-muted); text-decoration: none;">Mitra Agen</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Poktan 07. Seluruh Hak Cipta Dilindungi Undang-Undang. | BEM UNIKOM 25-26 | Merajut Asa</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Navbar Scroll Effect and Scroll Spy
            const navbar = document.getElementById('navbar');
            const sections = document.querySelectorAll('section[id], header.hero');
            const navLinks = document.querySelectorAll('.nav-links a');

            window.addEventListener('scroll', () => {
                // Navbar Background
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }

                // Scroll Spy untuk class active
                let current = 'beranda';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (window.scrollY >= (sectionTop - 150)) {
                        const id = section.getAttribute('id');
                        current = id ? id : 'beranda';
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    const href = link.getAttribute('href');
                    if (current === 'beranda' && href === '/') {
                        link.classList.add('active');
                    } else if (href === '#' + current) {
                        link.classList.add('active');
                    }
                });
            });

            // Intersection Observer for scroll animations
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



    <!-- Nav Drawer -->
    <div class="nav-drawer-overlay" id="drawerOverlay"></div>
    <nav class="nav-drawer" id="navDrawer">
        <div class="nav-drawer-header">
            <a href="/" class="logo"><i class="ph-fill ph-plant"></i> Poktan<span>07</span></a>
            <button class="nav-drawer-close" id="drawerClose"><i class="ph-bold ph-x"></i></button>
        </div>
        <ul class="nav-drawer-links">
            <li><a href="/"  class="active">Beranda</a></li>
            <li><a href="#kegiatan">Kegiatan</a></li>
            <li><a href="/list-agen">Kemitraan Agen</a></li>
            @if(auth()->check())
                @if(auth()->user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="btn-glow"><i class="ph-bold ph-squares-four"></i> Dashboard Admin</a></li>
                @elseif(auth()->user()->role === 'petani')
                    <li><a href="{{ route('petani.dashboard') }}" class="btn-glow"><i class="ph-bold ph-squares-four"></i> Dashboard Petani</a></li>
                @endif
            @else
                <li><a href="/register" class="btn-glow"><i class="ph-bold ph-user-plus"></i> Daftar Sekarang</a></li>
                <li><a href="/login">Login</a></li>
            @endif
        </ul>
    </nav>
    <script>
        const menuBtn = document.getElementById('mobileMenuBtn');
        const drawer = document.getElementById('navDrawer');
        const overlay = document.getElementById('drawerOverlay');
        const closeBtn = document.getElementById('drawerClose');
        function openDrawer() { drawer.classList.add('open'); overlay.classList.add('open'); document.body.style.overflow='hidden'; }
        function closeDrawer() { drawer.classList.remove('open'); overlay.classList.remove('open'); document.body.style.overflow=''; }
        if(menuBtn) menuBtn.addEventListener('click', openDrawer);
        if(closeBtn) closeBtn.addEventListener('click', closeDrawer);
        if(overlay) overlay.addEventListener('click', closeDrawer);
    </script>
</body>
</html>
