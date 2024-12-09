@extends('layouts.adminDashboard')

@section('title', 'Dashboard PKM')

@section('content')
<section class="mt-4">
    <!-- Progress Bar -->
    <div class="mb-4">
        <h4>Pengajuan Proposal</h4>
        <div class="progress" style="height: 20px;">
            <div class="progress-bar bg-success" style="width: 70%;">70%</div>
        </div>
    </div>

    <!-- Status Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-danger text-white text-center">
                <div class="card-body">
                    <h2>0</h2>
                    <p>Pengajuan Baru</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white text-center">
                <div class="card-body">
                    <h2>4</h2>
                    <p>Proposal lolos Seleksi</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white text-center">
                <div class="card-body">
                    <h2>3</h2>
                    <p>Proposal yang Didanai</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Total Partisipasi Mahasiswa Per Prodi
                </div>
                <div class="card-body">
                    <canvas id="studentChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Total Partisipasi Dosen Per Prodi
                </div>
                <div class="card-body">
                    <canvas id="teacherChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<!-- Chart.js Script -->
<script>
    const studentCtx = document.getElementById('studentChart').getContext('2d');
    const teacherCtx = document.getElementById('teacherChart').getContext('2d');

    new Chart(studentCtx, {
        type: 'doughnut',
        data: {
            labels: ['TI', 'RPL', 'SIKC', 'TRIK', 'TPTU', 'TM', 'PM', 'Keperawatan'],
            datasets: [{
                data: [10, 15, 5, 8, 12, 7, 9, 6],
                backgroundColor: ['#f44336', '#ff9800', '#4caf50', '#2196f3', '#9c27b0', '#795548', '#3f51b5', '#009688']
            }]
        }
    });

    new Chart(teacherCtx, {
        type: 'doughnut',
        data: {
            labels: ['TI', 'RPL', 'SIKC', 'TRIK', 'TPTU', 'TM', 'PM', 'Keperawatan'],
            datasets: [{
                data: [5, 7, 3, 4, 6, 2, 3, 1],
                backgroundColor: ['#f44336', '#ff9800', '#4caf50', '#2196f3', '#9c27b0', '#795548', '#3f51b5', '#009688']
            }]
        }
    });
</script>
@endsection
