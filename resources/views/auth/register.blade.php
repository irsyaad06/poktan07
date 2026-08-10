<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabung Kelompok Tani - Polang 07</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            background-color: var(--bg-main);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        .register-container {
            background: var(--bg-surface);
            padding: 3rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 450px;
            border: 1px solid var(--border-color);
        }
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .register-header .logo {
            font-size: 2rem;
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .register-header .logo span {
            color: var(--accent);
        }
        .register-header p {
            color: var(--text-muted);
            margin: 0;
            font-size: 1.1rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-main);
            font-size: 1.05rem;
        }
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }
        .btn-register {
            width: 100%;
            padding: 0.9rem;
            font-size: 1.1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s;
            margin-top: 1rem;
        }
        .btn-register:hover {
            background: var(--primary-dark);
        }
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-muted);
        }
        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .alert {
            padding: 1rem;
            border-radius: var(--radius-md);
            margin-bottom: 1.5rem;
        }
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            color: var(--primary-dark);
            border: 1px solid var(--primary-light);
        }
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            color: #b91c1c;
            border: 1px solid #fca5a5;
            list-style: none;
            margin: 0 0 1.5rem 0;
            padding-left: 2rem;
        }
        .alert-error li {
            margin-bottom: 0.25rem;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="register-header">
            <a href="/" class="logo">
                <i class="ph-fill ph-plant"></i> Polang<span>07</span>
            </a>
            <p>Daftar sebagai anggota petani baru.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="ph-bold ph-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <ul class="alert alert-error">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Budi Santoso" required autofocus>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email Aktif</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Contoh: budi@gmail.com" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Kata Sandi (Password)</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Buat kata sandi yang mudah diingat" required>
            </div>

            <button type="submit" class="btn-register">Daftar Sekarang</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>

</body>
</html>
