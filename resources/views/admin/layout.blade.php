<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Polang 07</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            background-color: var(--bg-main);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            background: var(--bg-surface);
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease, transform 0.3s ease;
            flex-shrink: 0;
            z-index: 1000;
        }
        
        body.sidebar-collapsed .sidebar {
            margin-left: -250px;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .close-sidebar-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-main);
        }

        .sidebar-menu {
            list-style: none;
            padding: 1rem 0;
            margin: 0;
            flex: 1;
            overflow-y: auto;
        }
        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: var(--text-main);
            text-decoration: none;
            gap: 0.75rem;
            font-weight: 500;
        }
        .sidebar-menu li a:hover, .sidebar-menu li a.active {
            background: var(--primary-light);
            color: var(--primary-dark);
        }
        .sidebar-menu li a i {
            font-size: 1.25rem;
        }
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0; /* Prevent flex blowout */
        }
        .topbar {
            background: var(--bg-surface);
            padding: 1rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .toggle-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-main);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            border-radius: var(--radius-sm);
        }
        .toggle-btn:hover {
            background: var(--bg-main);
        }

        .content {
            padding: 2rem;
            flex: 1;
            overflow-y: auto;
        }
        .admin-card {
            background: var(--bg-surface);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            padding: 1.5rem;
            overflow-x: auto; /* Makes tables responsive */
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px; /* Ensure table doesn't squish too much */
        }
        .table th, .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        .table th {
            background: var(--bg-main);
            font-weight: 600;
            color: var(--text-muted);
        }
        
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                height: 100vh;
                margin-left: 0 !important;
                transform: translateX(-100%);
            }
            body.sidebar-mobile-open .sidebar {
                transform: translateX(0);
            }
            body.sidebar-mobile-open .sidebar-overlay {
                display: block;
            }
            .close-sidebar-btn {
                display: block;
            }
            .topbar {
                padding: 1rem;
            }
            .content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="/admin/dashboard" class="logo">
                <i class="ph-fill ph-plant"></i> Polang<span>07</span>
            </a>
            <button class="close-sidebar-btn" id="closeSidebarBtn">
                <i class="ph-bold ph-x"></i>
            </button>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="ph-duotone ph-squares-four"></i> Dashboard</a></li>
            <li><a href="{{ route('petani.index') }}" class="{{ request()->routeIs('petani.*') ? 'active' : '' }}"><i class="ph-duotone ph-users"></i> Data Petani</a></li>
            <li><a href="{{ route('hasil-panen.index') }}" class="{{ request()->routeIs('hasil-panen.*') ? 'active' : '' }}"><i class="ph-duotone ph-basket"></i> Hasil Panen</a></li>
            <li><a href="{{ route('agen.index') }}" class="{{ request()->routeIs('agen.*') ? 'active' : '' }}"><i class="ph-duotone ph-handshake"></i> Kemitraan Agen</a></li>
            <li><a href="{{ route('kegiatan.index') }}" class="{{ request()->routeIs('kegiatan.*') ? 'active' : '' }}"><i class="ph-duotone ph-calendar"></i> Kegiatan</a></li>
        </ul>
        <div style="padding: 1.5rem; border-top: 1px solid var(--border-color);">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline" style="width: 100%;"><i class="ph-bold ph-sign-out"></i> Logout</button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div style="display: flex; align-items: center; gap: 1rem;">
                <button class="toggle-btn" id="toggleSidebarBtn">
                    <i class="ph-bold ph-list"></i>
                </button>
                <span style="font-weight: 500; display: none;" class="desktop-greeting">Halo, {{ Auth::user()->name }}</span>
            </div>
            <div style="display: flex; align-items: center; gap: 1rem;">
                <span style="font-weight: 500;" class="mobile-greeting">Halo, {{ Auth::user()->name }}</span>
                <div style="width: 35px; height: 35px; border-radius: 50%; background: var(--primary); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </div>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </main>

    <script>
        const toggleBtn = document.getElementById('toggleSidebarBtn');
        const closeBtn = document.getElementById('closeSidebarBtn');
        const overlay = document.getElementById('sidebarOverlay');
        const body = document.body;

        // Toggle sidebar
        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                body.classList.toggle('sidebar-mobile-open');
            } else {
                body.classList.toggle('sidebar-collapsed');
            }
        });

        // Close sidebar on mobile
        closeBtn.addEventListener('click', () => {
            body.classList.remove('sidebar-mobile-open');
        });

        // Close when clicking overlay
        overlay.addEventListener('click', () => {
            body.classList.remove('sidebar-mobile-open');
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                body.classList.remove('sidebar-mobile-open');
            } else {
                body.classList.remove('sidebar-collapsed');
            }
        });
    </script>
    <style>
        @media (max-width: 768px) {
            .desktop-greeting { display: none !important; }
        }
        @media (min-width: 769px) {
            .mobile-greeting { display: none !important; }
            .desktop-greeting { display: block !important; }
        }
    </style>
</body>
</html>
