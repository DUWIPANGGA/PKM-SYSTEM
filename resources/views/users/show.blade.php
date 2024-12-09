@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Detail User</h1>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
            <li class="list-group-item"><strong>NIM:</strong> {{ $user->nim }}</li>
            <li class="list-group-item"><strong>Nama:</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>Prodi:</strong> {{ $user->prodi }}</li>
            <li class="list-group-item"><strong>Alamat:</strong> {{ $user->alamat }}</li>
            <li class="list-group-item"><strong>Angkatan:</strong> {{ $user->angkatan }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
        </ul>
    </div>
</div>
c@endsection
