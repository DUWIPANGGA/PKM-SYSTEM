@extends('layouts.dashboard')

@section('content')
    <h1>Daftar Users</h1>
    <a class="btn btn-success mb-3" href="{{ route('users.create') }}">Tambah User</a>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nim }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->prodi }}</td>
                    <td class="text-center">
                        <a class="btn btn-success" href="{{ route('users.show', $user) }}">Lihat</a>
                        <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
