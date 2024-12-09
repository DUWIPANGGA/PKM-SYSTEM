@extends('layouts.dashboard')

@section('title', 'Data Reviewer')

@section('content')
<h3>Data Reviewer</h3>

<!-- Tabel Data Reviewer -->
<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Data Mahasiswa</th>
                <th>Jenis / Judul PKM</th>
                <th>Nama Reviewer</th>
                <th>Total Nilai</th>
                <th>Monitoring</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>
                    <strong>230569</strong><br>
                    LAELA FAZAH INFORMATIKA
                </td>
                <td>Karsa Cipta<br>RANCANG BANGUN ALAT DETEKSI SUARA PARU-PARU BERBASIS ANDROID</td>
                <td>Reviewer A</td>
                <td>665</td>
                <td>
                    <button class="btn btn-success">
                        <i class="bi bi-telegram"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Tombol Cetak Laporan -->
<a href="#" class="btn btn-primary">Cetak Laporan</a>
@endsection
