<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Homespire</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 440px;
            width: 100%;
            padding: 48px 40px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .logo h1 {
            color: #667eea;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .logo p {
            color: #6b7280;
            font-size: 14px;
        }
        
        .login-title {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .login-title h2 {
            color: #1f2937;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .login-title p {
            color: #6b7280;
            font-size: 14px;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
        }
        
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }
        
        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }
        
        .alert ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            color: #374151;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .form-check input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            cursor: pointer;
        }
        
        .form-check label {
            color: #6b7280;
            font-size: 14px;
            cursor: pointer;
        }
        
        .btn-primary {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .footer-links {
            text-align: center;
            margin-top: 24px;
            color: #6b7280;
            font-size: 14px;
        }
        
        .footer-links a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
        
        .footer-links p {
            margin: 12px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1>Homespire</h1>
            <p>Admin Panel</p>
        </div>
        
        <div class="login-title">
            <h2>Login Admin</h2>
            <p>Masuk ke dashboard admin Homespire</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email Admin</label>
                <input type="email" 
                       id="email"
                       name="email"
                       placeholder="admin@homespire.com" 
                       value="{{ old('email') }}"
                       required 
                       autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" 
                       id="password"
                       name="password"
                       placeholder="••••••••" 
                       required>
            </div>
            
            <div class="form-check">
                <input type="checkbox" 
                       name="remember" 
                       id="remember">
                <label for="remember">Ingat Saya</label>
            </div>
            
            <button type="submit" class="btn-primary">
                Masuk ke Admin Panel
            </button>
        </form>
        
        <div class="footer-links">
            <p>Bukan admin? <a href="{{ route('login') }}">Login User</a></p>
            <p><a href="{{ route('home') }}">← Kembali ke Beranda</a></p>
        </div>
    </div>
</body>
</html>
