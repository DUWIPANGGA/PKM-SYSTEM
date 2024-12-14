<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun PKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .registrasi-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-back {
            background-color: red;
            color: white;
        }
        .btn-submit {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body style="background-image: url(/img/polindra-bg.png); background-repeat: no-repeat; background-size: cover;">


    <div class="registrasi-container">
        <a class="logo d-flex justify-content-center" href="logo-polindra">
            <img src="{{ asset('LogoPolindra.png') }}" alt="Logo" width="50">
        </a>
        <h2 class="text-center mb-4">Pendaftaran Akun PKM</h2>
        <div class="container mt-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/registrasi') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
        <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap Mahasiswa</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
        <label for="prodi" class="form-label">Prodi</label>
        <select class="form-control" id="prodi" name="prodi" required>
            <option value="Pilih Program Studi" selected disabled>Pilih Program Studi</option>
            <option value="Teknik Informatika" {{ old('prodi') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
            <option value="Rekayasa Perangkat Lunak" {{ old('prodi') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
            <option value="Sistem Informasi Kota Cerdas" {{ old('prodi') == 'Sistem Informasi Kota Cerdas' ? 'selected' : '' }}>Sistem Informasi Kota Cerdas</option>
            <option value="Teknik Mesin" {{ old('prodi') == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
            <option value="Teknik Perancangan Manufaktur" {{ old('prodi') == 'Teknik Perancangan Manufaktur' ? 'selected' : '' }}>Teknik Perancangan Manufaktur</option>
            <option value="Teknik Pendingin & Tata Udara" {{ old('prodi') == 'Teknik Pendingin & Tata Udara' ? 'selected' : '' }}>Teknik Pendingin & Tata Udara</option>
            <option value="Teknik Instrumentasi & Kontrol" {{ old('prodi') == 'Teknik Instrumentasi & Kontrol' ? 'selected' : '' }}>Teknik Instrumentasi & Kontrol</option>
            <option value="Keperawatan" {{ old('prodi') == 'Keperawatan' ? 'selected' : '' }}>Keperawatan</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
    </div>
    <div class="mb-3">
        <label for="angkatan" class="form-label">Angkatan</label>
        <input type="text" class="form-control" id="angkatan" name="angkatan" value="{{ old('angkatan') }}" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">No Telepon</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ url('/login') }}" class="btn btn-back">Kembali</a>
        <button type="submit" class="btn btn-submit">Simpan</button>
    </div>
</form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
