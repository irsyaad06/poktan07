<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Polang 07</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            background-color: var(--bg-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-card {
            background: var(--bg-surface);
            padding: 2rem;
            border-radius: var(--radius-lg);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
            border: 1px solid var(--border-color);
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-main);
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            background: var(--bg-main);
            color: var(--text-main);
            font-family: inherit;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }
        .alert {
            padding: 1rem;
            border-radius: var(--radius-md);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .alert-danger {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #f87171;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <a href="/" class="logo" style="justify-content: center; font-size: 1.8rem;">
                <i class="ph-fill ph-plant"></i> Polang<span>07</span>
            </a>
            <p style="color: var(--text-muted); margin-top: 0.5rem;">Admin Dashboard Login</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required autofocus placeholder="admin@polang07.com">
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Masuk ke Dashboard</button>
        </form>
        
        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="/" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;"><i class="ph-bold ph-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
