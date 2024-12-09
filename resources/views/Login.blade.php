<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>

<div class="login-container">
    <a class="logo d-flex justify-content-center" href="logo-polindra">
        <img src="{{ asset('LogoPolindra.png') }}" alt="Logo" width="50">
    </a>
    <h1 class="login-title">Masuk</h1>
    @if ($errors->any())
        <div class='alert alert-danger'>
            <ul>
                @foreach ($errors->all() as $item )
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="masuk" class="btn btn-primary w-100">Masuk</button>
        <br>
        <br>
        <button type="button" class="btn btn-primary w-100" onclick="location.href='{{ url('/registrasi') }}'">Daftar Sekarang</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
