@extends('layouts.dashboard')

@section('title', 'Upload Judul dan Data Anggota PKM')

@section('content')
@if (!is_null($data_pengajuan))
    <div class="row d-flex flext-row gap-5">
        <div class="card" style="width: 47%; margin: 15px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h1 class="text-center" style="font-size: 1.8rem; font-weight: bold; margin-bottom: 1.5rem;">Informasi Pengajuan PKM</h1>
            <div style="line-height: 1.8; font-size: 1rem;">
                <p><strong>Anggota:</strong></p>
                <ul style="list-style-type: disc; padding-left: 20px; margin-bottom: 1rem;">
                    @foreach (json_decode($data_pengajuan->anggota, true) as $anggota)
                        <li>
                            <b>{{ $anggota['nama'] }}</b> ({{ $anggota['nim'] }}) - {{ $anggota['prodi'] }}
                        </li>
                    @endforeach
                </ul>
                <p><strong>ID User:</strong> {{ $data_pengajuan->id_user }}</p>
                <p><strong>Tahun Usulan:</strong> {{ $data_pengajuan->tahun_usulan }}</p>
                <p><strong>Tahun Pelaksana:</strong> {{ $data_pengajuan->tahun_pelaksana }}</p>
                <p><strong>Judul PKM:</strong> {{ $data_pengajuan->judul_pkm }}</p>
                <p><strong>Jenis PKM:</strong> {{ $data_pengajuan->jenis_pkm }}</p>
                <p><strong>Abstrak:</strong></p>
                <p style="margin-left: 20px; font-style: italic; font-size: 0.95rem; color: #555;">{{ $data_pengajuan->abstrak }}</p>
                <p><strong>Dana:</strong> Rp {{ number_format($data_pengajuan->dana, 0, ',', '.') }}</p>
                <p>
                    <strong>Proposal File:</strong>
                    <a href="{{ asset('storage/' . $data_pengajuan->proposal_file) }}" target="_blank" style="color: #007bff; text-decoration: none;">
                        Lihat Proposal
                    </a>
                </p>
                <p><strong>Dibuat Pada:</strong> {{ $data_pengajuan->created_at->format('d M Y H:i:s') }}</p>
                <p><strong>Status:</strong>
                    <div class="alert alert-success" role="alert">
                        Proposal diterima

                </div></p>
            </div>
        </div>
        

        <div class="card" style="width: 47%; margin: 15px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-header">
                Review Dokumen Proposal
            </div>
            <div class="card-body">
                <embed src="{{ asset('storage/' . $data_pengajuan->proposal_file) }}" type="application/pdf" width="100%"
                    height="500px">
            </div>
        </div>
    </div>
    @else
    <div class="row d-flex flex-row gap-5">
        <div class="card" style="width: 47%; margin: 15px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h1 class="text-center" style="font-size: 1.8rem; font-weight: bold; margin-bottom: 1.5rem;">Informasi Pengajuan PKM</h1>
            <div style="line-height: 1.8; font-size: 1rem;">
                <p><strong>Anggota:</strong></p>
                <ul style="list-style-type: disc; padding-left: 20px; margin-bottom: 1rem;">
                    
                </ul>
                <p><strong>ID User:</strong> </p>
                <p><strong>Tahun Usulan:</strong> </p>
                <p><strong>Tahun Pelaksana:</strong> </p>
                <p><strong>Judul PKM:</strong> </p>
                <p><strong>Jenis PKM:</strong> </p>
                <p><strong>Abstrak:</strong></p>
                <p style="margin-left: 20px; font-style: italic; font-size: 0.95rem; color: #555;"></p>
                <p><strong>Dana:</strong> </p>
                <p>
                    <strong>Proposal File:</strong>
                    <span style="color: red;">File not found</span>
                </p>
                <p><strong>Dibuat Pada:</strong> </p>
                <p><strong>Status:</strong>
                    <div class="alert alert-danger" role="alert">
                        anda belum mengajukan proposal
                    </div>
                </p>
            </div>
        </div>
    
        <div class="card" style="width: 47%; margin: 15px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-header">
                Review Dokumen Proposal
            </div>
            <div class="card-body">
                <div style="text-align: center; color: #888; font-size: 1rem;">
                    <p><strong>File PDF tidak ditemukan.</strong></p>
                </div>
            </div>
        </div>
    </div>
    
    
@endif
@endsection
