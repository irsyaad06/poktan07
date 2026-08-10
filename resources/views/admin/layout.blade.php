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
        }
        .sidebar {
            width: 250px;
            background: var(--bg-surface);
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }
        .sidebar-menu {
            list-style: none;
            padding: 1rem 0;
            margin: 0;
            flex: 1;
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
        }
        .topbar {
            background: var(--bg-surface);
            padding: 1rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            align-items: center;
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
        }
        .table {
            width: 100%;
            border-collapse: collapse;
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
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="/admin/dashboard" class="logo">
                <i class="ph-fill ph-plant"></i> Polang<span>07</span>
            </a>
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
                <span style="font-weight: 500;">Halo, {{ Auth::user()->name }}</span>
                <div style="width: 35px; height: 35px; border-radius: 50%; background: var(--primary); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                    A
                </div>
            </div>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </main>
</body>
</html>
