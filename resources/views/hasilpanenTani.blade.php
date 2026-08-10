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
        <!-- Rendered by JS -->
    </header>

    <!-- Hasil Panen Section -->
    <section class="section">
        <div class="section-header">
            <h2>Katalog Produk</h2>
            <p>Daftar lengkap komoditas agrikultur berkualitas tinggi yang dikelola dengan standar mutu terbaik.</p>
        </div>
        <div class="grid" id="panen-grid">
            <!-- Rendered by JS -->
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

    <script src="{{ asset('data.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const petaniId = parseInt(urlParams.get('id'));

            const petani = petaniList.find(p => p.id === petaniId);
            const headerContainer = document.getElementById('petani-header');
            const grid = document.getElementById('panen-grid');

            if (!petani) {
                headerContainer.innerHTML = `
                    <h1 class="page-title">Data Tidak Ditemukan</h1>
                    <p style="margin-bottom: 2rem; color: var(--text-muted);">Maaf, profil petani yang Anda cari tidak tersedia dalam sistem kami.</p>
                    <a href="/" class="btn btn-primary"><i class="ph-bold ph-arrow-left"></i> Kembali ke Beranda</a>
                `;
                return;
            }

            // WhatsApp Integration for Profile
            let waNumber = petani.whatsapp.replace(/\D/g, '');
            if (waNumber.startsWith('0')) {
                waNumber = '62' + waNumber.substring(1);
            }
            const profileMessage = `Halo ${petani.name}, saya tertarik dengan hasil panen Anda dari Polang 07.`;
            const profileWaUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(profileMessage)}`;

            // Render Header with comprehensive data
            headerContainer.innerHTML = `
                <div class="petani-profile animate-on-scroll is-visible">
                    <img src="${petani.image}" alt="${petani.name}" class="profile-avatar" style="border-color: var(--primary-light);">
                    <h1 class="page-title">${petani.name}</h1>
                    
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 1rem; margin-bottom: 1.5rem;">
                        <span class="badge" style="position: relative; top: 0; right: 0; background: var(--primary); color: white;">
                            <i class="ph-fill ph-plant"></i> ${petani.role}
                        </span>
                        <span class="badge" style="position: relative; top: 0; right: 0; background: var(--bg-surface); color: var(--text-main); border: 1px solid var(--border-color);">
                            <i class="ph-fill ph-certificate" style="color: var(--accent);"></i> ${petani.cert}
                        </span>
                        <span class="badge" style="position: relative; top: 0; right: 0; background: var(--bg-surface); color: var(--text-main); border: 1px solid var(--border-color);">
                            <i class="ph-fill ph-bounding-box" style="color: var(--primary);"></i> ${petani.area}
                        </span>
                        <span class="badge" style="position: relative; top: 0; right: 0; background: var(--bg-surface); color: var(--text-main); border: 1px solid var(--border-color);">
                            <i class="ph-fill ph-whatsapp-logo" style="color: #25D366;"></i> ${petani.whatsapp}
                        </span>
                    </div>

                    <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 600px; margin: 0 auto; line-height: 1.6; margin-bottom: 1.5rem;">
                        "${petani.desc}"
                    </p>

                    <a href="${profileWaUrl}" target="_blank" class="btn btn-primary" style="background: #25D366; box-shadow: 0 4px 14px 0 rgba(37, 211, 102, 0.39); display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="ph-fill ph-whatsapp-logo" style="font-size: 1.2rem;"></i> Beli via WhatsApp
                    </a>
                </div>
            `;

            // Filter hasil panen
            const hasil = hasilPanenList.filter(h => h.petaniId === petaniId);

            if (hasil.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <i class="ph-duotone ph-basket"></i>
                        <h3>Belum Ada Produk</h3>
                        <p>Petani ini sedang dalam masa tanam atau belum mencatat hasil panen terbaru dalam sistem.</p>
                    </div>
                `;
                return;
            }

            // Render Hasil Panen with complete properties
            hasil.forEach((item, index) => {
                const card = document.createElement('div');
                card.className = 'card animate-on-scroll is-visible';
                card.style.animationDelay = `${(index % 3) * 150}ms`;
                
                // Determine badge color based on type
                let typeColor = "var(--primary)";
                if(item.type === "Konvensional") typeColor = "var(--text-muted)";
                else if(item.type === "Hidroponik") typeColor = "#0284c7"; // Sky 600

                card.innerHTML = `
                    <div class="card-img-wrap" style="height: 240px;">
                        <span class="badge" style="background: ${typeColor}; color: white; left: 1rem; right: auto;">
                            ${item.type}
                        </span>
                        <span class="badge" style="background: var(--accent); color: white;">
                            <i class="ph-fill ph-star"></i> ${item.grade}
                        </span>
                        <img src="${item.image}" alt="${item.name}" class="card-img">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title" style="font-size: 1.25rem;">${item.name}</h3>
                        
                        <div style="margin: 1rem 0; display: flex; justify-content: center; align-items: center; background: var(--bg-main); padding: 0.75rem; border-radius: var(--radius-md);">
                            <div style="display: flex; flex-direction: column; text-align: center;">
                                <span style="font-size: 0.8rem; color: var(--text-light); text-transform: uppercase; font-weight: 600; letter-spacing: 0.05em;">Harga</span>
                                <span class="product-price">${item.price}</span>
                            </div>
                        </div>
                    </div>
                `;
                grid.appendChild(card);
            });
        });
    </script>
</body>
</html>
