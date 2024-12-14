@extends('layouts.dashboard')

@section('title', 'Dashboard PKM')

@section('content')
    <section class="mt-4">
        <!-- Progress Bar -->
        <div class="mb-4">
            <h4>Pengajuan Proposal</h4>
            <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-success" style="width: {{ $persentase_selain_menunggu }}%;">
                    {{ $persentase_selain_menunggu }}%</div>
            </div>
        </div>

        <!-- Status Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-danger text-white text-center">
                    <div class="card-body">
                        <h2>{{ $total_pengajuan_baru }}</h2>
                        <p>Pengajuan Baru</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white text-center">
                    <div class="card-body">
                        <h2>{{ $total_pengajuan_lolos }}</h2>
                        <p>Proposal lolos Seleksi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white text-center">
                    <div class="card-body">
                        <h2>{{ $total_pengajuan_didanai }}</h2>
                        <p>Proposal yang Didanai</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

                    <div class="card-body">
                        <canvas id="studentChart" width="400" height="400"
                            style="border: 1px solid #ddd; border-radius: 10px;"></canvas>
                    </div>
            </div>
            <div class="col-md-6">

                    <div class="card-body">
                        <canvas id="pkmChart" width="400" height="400"
                            style="border: 1px solid #ddd; border-radius: 10px;"></canvas>
                    </div>
            </div>
            
        </div>

        <script>
            const prodiData = @json($prodiCounts);
            const labels = Object.keys(prodiData);
            const values = Object.values(prodiData);

            const studentCtx = document.getElementById('studentChart').getContext('2d');

            new Chart(studentCtx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: ['#f44336', '#ff9800', '#4caf50', '#2196f3', '#9c27b0', '#795548',
                            '#3f51b5', '#009688'
                        ],
                        borderColor: ['#f44336', '#ff9800', '#4caf50', '#2196f3', '#9c27b0', '#795548',
                            '#3f51b5', '#009688'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Total Partisipasi Mahasiswa Per Prodi'
                        }
                    }
                }
            });
            const pkmData = @json($pkmCounts);
        const label_pkm = Object.keys(pkmData); 
        const value_pkm = Object.values(pkmData);
        const ctx = document.getElementById('pkmChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: label_pkm,
                datasets: [{
                    label: 'Jumlah PKM',
                    data: value_pkm,
                    backgroundColor: [
                        '#f44336', '#ff9800', '#4caf50', '#2196f3', '#9c27b0',
                        '#795548', '#3f51b5', '#009688'
                    ],
                    borderColor: [
                        '#f44336', '#ff9800', '#4caf50', '#2196f3', '#9c27b0',
                        '#795548', '#3f51b5', '#009688'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Distribusi Jenis PKM'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    </section>
@endsection

@section('scripts')
    <!-- Chart.js Script -->



@endsection
