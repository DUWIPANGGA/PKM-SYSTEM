@extends('layouts.dashboard')

@section('content')
    <h1>Tambah User</h1>
    <form action="{{ route('users.store') }}" method="POST"
        style="width: 50%; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf
        <label style="display: block; margin-bottom: 10px;">NIM:</label>
        <input type="text" name="nim" value="{{ old('nim') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <label style="display: block; margin-bottom: 10px;">Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <label style="display: block; margin-bottom: 10px;">Prodi:</label>
        <input type="text" name="prodi" value="{{ old('prodi') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <label style="display: block; margin-bottom: 10px;">Alamat:</label>
        <textarea name="alamat" required
            style="width: 100%; height: 100px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">{{ old('alamat') }}</textarea>
        <label style="display: block; margin-bottom: 10px;">Angkatan:</label>
        <input type="number" name="angkatan" value="{{ old('angkatan') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <label style="display: block; margin-bottom: 10px;">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <label style="display: block; margin-bottom: 10px;">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <label style="display: block; margin-bottom: 10px;">Password:</label>
        <input type="password" name="password" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        <label style="display: block; margin-bottom: 10px;">Role:</label>
        <select name="role" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        <button type="submit"
            style="width: 100%; height: 40px; background-color: #4CAF50; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Simpan</button>
    </form>
    <a href="{{ route('users.index') }}" class="btn btn-primary">Kembali</a>
@endsection
