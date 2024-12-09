@extends('layouts.Admindashboard') <!-- Pastikan layout Admindashboard sudah ada -->

@section('content')

    <!-- Halaman Detail Data PKM -->
    <div class="mt-4">
        <h3>Detail Data PKM</h3>
        
        <!-- Dropdown Show Entries -->
        <div class="d-flex align-items-center mt-2">
            <label for="entries" class="me-2">Show</label>
            <select id="entries" class="form-select w-auto">
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span class="ms-2">Entries</span>
        </div>


        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Detail Kelompok
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama Ketua</th>
                        <td>: Laela Fazah Fitriani</td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td>: 12345</td>
                    </tr>
                    <tr>
                        <th>Prodi</th>
                        <td>: Informatika</td>
                    </tr>
                    <tr>
                        <th>Jenis PKM</th>
                        <td>: Karsa Cipta</td>
                    </tr>
                    <tr>
                        <th>Judul PKM</th>
                        <td>: Deteksi Paru-Paru</td>
                    </tr>
                    <tr>
                        <th>Institusi</th>
                        <td>: Politeknik Negeri Indramayu</td>
                    </tr>
                    <tr>
                        <th>No. Telephone</th>
                        <td>: 089564321</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
