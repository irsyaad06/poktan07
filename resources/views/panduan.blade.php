<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Penggunaan - Poktan 07</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        .tabs-nav {
            display: flex;
            gap: 1rem;
            border-bottom: 2px solid var(--border-color);
            margin-bottom: 2.5rem;
            overflow-x: auto;
            scrollbar-width: none;
        }
        .tabs-nav::-webkit-scrollbar {
            display: none;
        }
        .tab-btn {
            background: none;
            border: none;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }
        .tab-btn:hover {
            color: var(--primary);
            background: rgba(34, 197, 94, 0.05);
            border-radius: var(--radius-md) var(--radius-md) 0 0;
        }
        .tab-btn.active {
            color: var(--primary-dark);
            border-bottom-color: var(--primary);
            background: rgba(34, 197, 94, 0.1);
            border-radius: var(--radius-md) var(--radius-md) 0 0;
        }
        
        .tab-pane {
            display: none;
            animation: fadeIn 0.4s ease;
        }
        .tab-pane.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .guide-section {
            background: var(--bg-surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: 2.5rem;
            margin-bottom: 3rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .guide-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            color: var(--primary-dark);
            margin-top: 0;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px dashed var(--border-color);
        }
        
        .step-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        .step-item {
            display: flex;
            gap: 1.5rem;
            align-items: flex-start;
            position: relative;
        }
        /* Line connecting steps */
        .step-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 23px; /* Center of the 48px circle */
            top: 48px;
            bottom: -2rem;
            width: 2px;
            background: var(--border-color);
            z-index: 0;
        }
        
        .step-number {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.25rem;
            box-shadow: 0 4px 10px rgba(34, 197, 94, 0.3);
            z-index: 1;
        }
        .step-content {
            background: var(--bg-main);
            padding: 1.5rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            flex: 1;
        }
        .step-content h4 {
            margin: 0 0 1rem 0;
            font-size: 1.2rem;
            color: var(--text-main);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .step-content p {
            margin: 0 0 0.75rem 0;
            color: var(--text-muted);
            line-height: 1.6;
        }
        .step-content p:last-child {
            margin-bottom: 0;
        }
        .step-content ul {
            margin: 0 0 1rem 1.5rem;
            color: var(--text-muted);
            line-height: 1.6;
            padding: 0;
        }
        
        .info-box {
            background: rgba(34, 197, 94, 0.1);
            border-left: 4px solid var(--primary);
            padding: 1.25rem 1.5rem;
            margin-bottom: 2rem;
            border-radius: 0 var(--radius-md) var(--radius-md) 0;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }
        .info-box i {
            font-size: 1.5rem;
            color: var(--primary-dark);
            margin-top: 0.1rem;
        }

        /* Mockup Styles */
        .ui-mockup {
            background: var(--bg-surface);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 1rem;
            margin-top: 1.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            position: relative;
        }
        .ui-mockup::before {
            content: 'Contoh Tampilan (Mockup)';
            display: block;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--primary-dark);
            margin-bottom: 0.75rem;
            font-weight: 700;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 0.5rem;
        }
        
        /* Table Mockup Classes */
        .mock-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
            text-align: left;
        }
        .mock-table th {
            background: var(--bg-main);
            color: var(--text-muted);
            font-weight: 600;
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }
        .mock-table td {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }

        /* Responsive Panduan */
        @media (max-width: 768px) {
            .page-header {
                padding-top: 6rem;
                padding-left: 1.25rem;
                padding-right: 1.25rem;
            }
            .page-title {
                font-size: 2rem !important;
            }
            .tabs-nav {
                gap: 0.25rem;
                margin-bottom: 1.5rem;
            }
            .tab-btn {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
            .guide-section {
                padding: 1.5rem 1rem;
                margin-bottom: 1.5rem;
            }
            .guide-title {
                font-size: 1.2rem;
            }
            .step-item {
                flex-direction: column;
                gap: 0.75rem;
            }
            .step-item:not(:last-child)::after {
                display: none;
            }
            .step-number {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
            .step-content {
                padding: 1rem;
            }
            .step-content h4 {
                font-size: 1.05rem;
            }
            .ui-mockup {
                overflow-x: auto;
            }
            .mock-table {
                min-width: 420px;
            }
            section.section {
                padding-left: 1.25rem;
                padding-right: 1.25rem;
            }
        }
    </style>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar scrolled" id="navbar">
        <a href="/" class="logo">
            <i class="ph-fill ph-plant"></i> Poktan<span>07</span>
        </a>
        <button class="mobile-menu-btn" id="mobileMenuBtn"><i class="ph-bold ph-list"></i></button>
        <ul class="nav-links" id="navLinks">
            <li><a href="/">Beranda</a></li>
            <li><a href="/#kegiatan">Kegiatan</a></li>
            <li><a href="/list-agen">Kemitraan Agen</a></li>
            <li><a href="/panduan" class="active">Panduan</a></li>
            @if(auth()->check())
                @if(auth()->user()->role === 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="btn btn-glow"><i class="ph-bold ph-squares-four"></i> Dashboard Admin</a></li>
                @elseif(auth()->user()->role === 'petani')
                    <li><a href="{{ route('petani.dashboard') }}" class="btn btn-glow"><i class="ph-bold ph-squares-four"></i> Dashboard Petani</a></li>
                @endif
            @else
                <li><a href="/#petani" class="btn btn-glow">Daftar Petani</a></li>
            @endif
        </ul>
    </nav>

    <header class="page-header">
        <span class="hero-tag" style="background: var(--bg-surface);"><i class="ph-fill ph-book-open"></i> Pusat Bantuan Terpadu</span>
        <h1 class="page-title">Panduan Penggunaan Sistem</h1>
        <p style="color: var(--text-muted); max-width: 700px; margin: 1rem auto 0; font-size: 1.1rem;">
            Pilih *Tab* yang sesuai dengan peran Anda di bawah ini untuk melihat panduan langkah demi langkah sesuai dengan tampilan asli sistem kami.
        </p>
    </header>

    <section class="section bg-main">
        <div class="container" style="max-width: 900px; margin: 0 auto;">

            <!-- Tabs Navigation -->
            <div class="tabs-nav">
                <button class="tab-btn active" data-target="tab-publik">
                    <i class="ph-duotone ph-users-three"></i> Panduan Publik
                </button>
                <button class="tab-btn" data-target="tab-petani">
                    <i class="ph-duotone ph-plant"></i> Panduan Petani
                </button>
                <button class="tab-btn" data-target="tab-admin">
                    <i class="ph-duotone ph-shield-star"></i> Panduan Admin
                </button>
            </div>

            <!-- Tab Content: Publik -->
            <div class="tab-pane active" id="tab-publik">
                <div class="guide-section">
                    <h2 class="guide-title"><i class="ph-duotone ph-users-three"></i> Untuk Konsumen & Publik</h2>
                    <div class="step-container">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-storefront" style="color: var(--primary);"></i> Menjelajahi Keluarga Petani</h4>
                                <p>Pada Halaman Beranda (Home), gulir ke bawah hingga bagian <strong>"Keluarga Petani Kami"</strong>. Di sana, Anda akan melihat kartu-kartu profil para pahlawan pangan lokal kami (Petani).</p>
                                <div class="ui-mockup" style="display: flex; gap: 1rem; align-items: center;">
                                    <div style="width: 50px; height: 50px; background: #e2e8f0; border-radius: 50%;"></div>
                                    <div style="flex: 1;">
                                        <div style="font-weight: 600;">Pak Budi Santoso</div>
                                        <div style="font-size: 0.8rem; color: var(--text-muted);">Desa Sukamakmur</div>
                                    </div>
                                    <button class="btn btn-outline" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">Lihat Hasil Tani</button>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-basket" style="color: var(--primary);"></i> Melihat Katalog Produk</h4>
                                <p>Setelah masuk ke etalase petani, Anda akan melihat daftar lengkap sayuran atau buah yang mereka panen beserta harganya.</p>
                                <div class="ui-mockup">
                                    <div style="display: flex; gap: 1rem; background: var(--bg-main); padding: 1rem; border-radius: var(--radius-sm);">
                                        <div style="width: 80px; height: 80px; background: #cbd5e1; border-radius: var(--radius-sm);"></div>
                                        <div style="flex: 1;">
                                            <h5 style="margin: 0 0 0.25rem 0; font-size: 1rem;">Tomat Ceri Hidroponik</h5>
                                            <span style="background: rgba(34, 197, 94, 0.1); color: var(--primary-dark); padding: 0.1rem 0.5rem; border-radius: 99px; font-size: 0.75rem;">Rp 25.000 / Kg</span>
                                            <p style="margin: 0.5rem 0 0 0; font-size: 0.8rem; color: var(--text-muted);">Tomat segar baru dipetik pagi ini. Manis dan renyah.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content: Petani -->
            <div class="tab-pane" id="tab-petani">
                <div class="guide-section">
                    <h2 class="guide-title"><i class="ph-duotone ph-plant"></i> Untuk Pahlawan Pangan (Petani)</h2>
                    
                    <div class="info-box">
                        <i class="ph-fill ph-info"></i>
                        <div>
                            <p style="margin: 0; color: var(--primary-dark); font-weight: 600;">Tahap Persetujuan Akun</p>
                            <p style="margin: 0.25rem 0 0 0; color: var(--text-main); font-size: 0.95rem;">Setelah Anda mendaftar, akun Anda akan berstatus <strong>Menunggu (Pending)</strong>. Anda baru bisa masuk (Login) ke dalam sistem <strong>setelah Admin menyetujui pendaftaran Anda</strong>.</p>
                        </div>
                    </div>

                    <div class="step-container">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-user-plus" style="color: var(--primary);"></i> Pendaftaran Akun Awal</h4>
                                <p>Klik <strong>"Gabung Kelompok"</strong> di beranda. Isi formulir awal yang terdiri dari Nama Lengkap, Email, dan Kata Sandi.</p>
                                <div class="ui-mockup">
                                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                                        <div>
                                            <label style="font-size: 0.85rem; font-weight: 500; display: block; margin-bottom: 0.3rem;">Nama Lengkap</label>
                                            <input type="text" disabled placeholder="Contoh: Budi Santoso" style="width: 100%; padding: 0.6rem; border: 1px solid var(--border-color); border-radius: 4px; background: #f8fafc;">
                                        </div>
                                        <div>
                                            <label style="font-size: 0.85rem; font-weight: 500; display: block; margin-bottom: 0.3rem;">Email Aktif</label>
                                            <input type="email" disabled placeholder="Contoh: budi@gmail.com" style="width: 100%; padding: 0.6rem; border: 1px solid var(--border-color); border-radius: 4px; background: #f8fafc;">
                                        </div>
                                        <button class="btn btn-primary" style="padding: 0.6rem; opacity: 0.7; justify-content: center;">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-user-circle" style="color: var(--primary);"></i> Melengkapi Profil (Setelah Disetujui)</h4>
                                <p>Setelah akun disetujui Admin dan Anda berhasil <i>Login</i>, buka menu <strong>"Profil Saya"</strong>. Di sini Anda WAJIB melengkapi identitas Anda sebagai petani agar pembeli percaya.</p>
                                <div class="ui-mockup">
                                    <div style="font-size: 0.85rem; color: var(--text-main); margin-bottom: 0.5rem;"><i class="ph-bold ph-pencil-simple"></i> Lengkapi kolom berikut:</div>
                                    <ul style="font-size: 0.85rem; margin: 0; padding-left: 1.5rem; color: var(--text-muted);">
                                        <li><strong>Foto Profil</strong></li>
                                        <li><strong>Nama Kelompok Tani</strong> (Isi 'Mandiri' jika tidak ada)</li>
                                        <li><strong>Lokasi / Desa</strong></li>
                                        <li><strong>Nomor WhatsApp</strong> (Agar agen mudah menghubungi balik)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-plus-circle" style="color: var(--primary);"></i> Mencatat "Hasil Panen Saya"</h4>
                                <p>Di Dashboard, pilih menu <strong>"Hasil Panen Saya"</strong> dan klik <strong>"Tambah Hasil Panen"</strong>. Masukkan Nama Produk, Harga, Metode Tanam, Grade, Stok, Deskripsi lengkap, dan Foto Produk.</p>
                                <p>Hasil panen Anda akan langsung tampil dalam bentuk <i>Card</i> (Kartu) yang rapi seperti contoh di bawah ini:</p>
                                <div class="ui-mockup">
                                    <div style="width: 250px; border: 1px solid var(--border-color); border-radius: 8px; overflow: hidden; background: white;">
                                        <div style="height: 120px; background: #cbd5e1; position: relative;">
                                            <span style="position: absolute; top: 0.5rem; right: 0.5rem; background: rgba(255, 255, 255, 0.9); padding: 0.2rem 0.5rem; border-radius: 99px; font-size: 0.75rem; font-weight: 700; color: var(--primary-dark);">Rp 25.000 / Kg</span>
                                        </div>
                                        <div style="padding: 1rem;">
                                            <div style="font-weight: 600; font-size: 1rem;">Tomat Ceri</div>
                                            <div style="color: var(--text-muted); font-size: 0.75rem; margin: 0.25rem 0;">Stok: 100 Kg | Metode: Hidroponik</div>
                                            <div style="display: flex; gap: 0.5rem; margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 0.75rem;">
                                                <button class="btn btn-outline" style="padding: 0.2rem 0.5rem; font-size: 0.75rem; flex: 1; justify-content: center;">Ubah</button>
                                                <button class="btn btn-danger" style="padding: 0.2rem 0.5rem; font-size: 0.75rem; flex: 1; justify-content: center; background: #fee2e2; color: #dc2626; border: none;">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-whatsapp-logo" style="color: var(--primary);"></i> Menghubungi "Mitra Agen"</h4>
                                <p>Pilih menu <strong>"Mitra Agen"</strong>. Ini adalah fitur eksklusif untuk Petani. Anda akan melihat kartu agen beserta tombol <strong>Hubungi Agen</strong> yang akan membuka WhatsApp dengan template pesan otomatis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content: Admin -->
            <div class="tab-pane" id="tab-admin">
                <div class="guide-section">
                    <h2 class="guide-title"><i class="ph-duotone ph-shield-star"></i> Untuk Pengelola (Admin Sistem)</h2>
                    <div class="step-container">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-user-check" style="color: var(--primary);"></i> Memverifikasi "Persetujuan Akun"</h4>
                                <p>Tugas paling krusial Admin adalah menjaga pintu masuk aplikasi. Masuk ke menu <strong>"Persetujuan Akun"</strong>.</p>
                                <ul>
                                    <li>Anda akan melihat senarai pendaftar. Perhatikan kolom <strong>Status</strong> (Menunggu / Disetujui).</li>
                                    <li>Untuk akun yang masih "Menunggu", Anda bisa klik tombol <strong style="color: var(--primary-dark);"><i class="ph-bold ph-check"></i> Setujui</strong> untuk mengizinkan mereka masuk ke sistem.</li>
                                    <li>Jika terjadi kesalahan, Anda bisa klik <strong>Batalkan</strong> atau hapus akun mereka.</li>
                                </ul>
                                <div class="ui-mockup">
                                    <table class="mock-table">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Budi Santoso</td>
                                                <td>budi@gmail.com</td>
                                                <td><span style="background: rgba(239, 68, 68, 0.1); color: #b91c1c; padding: 0.2rem 0.5rem; border-radius: 99px; font-size: 0.7rem; font-weight: 600;"><i class="ph-bold ph-clock"></i> Menunggu</span></td>
                                                <td>
                                                    <div style="display: flex; gap: 0.25rem;">
                                                        <button style="background: var(--primary); color: white; border: none; padding: 0.3rem 0.5rem; border-radius: 4px; font-size: 0.75rem;"><i class="ph-bold ph-check"></i> Setujui</button>
                                                        <button style="background: #ef4444; color: white; border: none; padding: 0.3rem 0.5rem; border-radius: 4px;"><i class="ph-bold ph-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-users" style="color: var(--primary);"></i> Melihat "Data Petani"</h4>
                                <p>Menu <strong>"Data Petani"</strong> berisi profil lengkap petani yang sudah berhasil masuk dan melengkapi data mereka, termasuk Kelompok Tani, Lokasi, dan Nomor WhatsApp mereka.</p>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-basket" style="color: var(--primary);"></i> Mengawasi "Hasil Panen" Nasional</h4>
                                <p>Di menu <strong>"Hasil Panen"</strong>, Admin dapat memantau seluruh data panen yang diposting oleh para petani di etalase publik. Admin berfungsi sebagai pengawas dan bisa melakukan aksi <strong>Ubah</strong> atau <strong>Hapus</strong> terhadap data yang tidak valid.</p>
                                <div class="ui-mockup">
                                    <table class="mock-table">
                                        <thead>
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Petani</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 600;">Tomat Ceri Super</td>
                                                <td>Bapak Budi</td>
                                                <td>Rp 25.000 / Kg</td>
                                                <td>
                                                    <button class="btn btn-outline" style="padding: 0.2rem 0.5rem; font-size: 0.75rem;">Ubah</button>
                                                    <button class="btn btn-outline" style="padding: 0.2rem 0.5rem; font-size: 0.75rem; color: #b91c1c; border-color: #fca5a5;">Hapus</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4><i class="ph-bold ph-handshake" style="color: var(--primary);"></i> Kelola "Kemitraan Agen" & "Kegiatan"</h4>
                                <p>Gunakan menu ini untuk menambahkan profil agen penyalur resmi baru, atau membuat artikel berita pada menu Kegiatan yang akan tampil di halaman Beranda publik.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <a href="/" class="logo">
                    <i class="ph-fill ph-plant"></i> Poktan<span>07</span>
                </a>
                <p>Memberdayakan petani lokal melalui praktik pertanian modern dan berkelanjutan.</p>
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
            <p>&copy; 2026 Poktan 07. Seluruh Hak Cipta Dilindungi Undang-Undang. | BEM UNIKOM 25-26 | Merajut Asa</p>
        </div>
    </footer>

    <!-- Tab Switching Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabPanes = document.querySelectorAll('.tab-pane');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons and panes
                    tabBtns.forEach(b => b.classList.remove('active'));
                    tabPanes.forEach(p => p.classList.remove('active'));

                    // Add active class to clicked button
                    this.classList.add('active');

                    // Add active class to target pane
                    const targetId = this.getAttribute('data-target');
                    document.getElementById(targetId).classList.add('active');
                });
            });
        });
    </script>

    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');
        if (mobileMenuBtn && navLinks) {
            mobileMenuBtn.addEventListener('click', () => {
                navLinks.classList.toggle('nav-active');
            });
        }
    </script>
</body>
</html>
