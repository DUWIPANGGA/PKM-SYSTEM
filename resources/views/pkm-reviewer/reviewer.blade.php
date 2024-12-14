@extends('layouts.dashboard') <!-- Pastikan layout utama sudah ada -->

@section('content')
    <!-- Main Content -->
    <div class="mt-4">
        <h3>Data Reviewer</h3>

        <!-- Tambahkan dropdown Show Entries -->
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="table-responsive mt-3 ">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Data Mahasiswa</th>
                        <th>Jenis / Judul</th>
                        <th>File Proposal</th>
                        <th>Total Nilai</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($proposal_user) > 0)
                        @foreach ($proposal_user as $item)
                            <tr>
                                {{-- {{ dd(json_decode($item->anggota)) }}; --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @foreach (json_decode($item->anggota) as $anggota)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $anggota->role }}</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">NIM: {{ $anggota->nim }}</li>
                                                    <li class="list-group-item">Nama: {{ $anggota->nama }}</li>
                                                    <li class="list-group-item">Prodi: {{ $anggota->prodi }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $item->jenis_pkm }}:{{ $item->judul_pkm }} <br>
                                    {{ $item->abstrak }}
                                </td>
                                <td>
                                    <p>1. status</p>
                                <div class="text-center">
                                    @if ($item->status == 'menunggu')
                                        <div class="btn btn-secondary w-100">Menunggu</div>
                                    @elseif ($item->status == 'sedang direview')
                                        <div class="btn btn-warning w-100">Sedang Direview</div>
                                    @elseif ($item->status == 'sudah direview')
                                        <div class="btn btn-info w-100">Sudah Direview</div>
                                    @elseif ($item->status == 'ditolak')
                                        <div class="btn btn-danger w-100">Ditolak</div>
                                    @elseif ($item->status == 'lolos')
                                        <div class="btn btn-success w-100">Lolos</div>
                                    @endif
                                </div>
                                <p class="mt-2">2. file</p>
                                <a href="{{ asset('storage/' . $item->proposal_file) }}" target="_blank"
                                    class="btn btn-primary  text-center w-100">
                                    Lihat Proposal
                                </a>
                                </td>
                                <td>
                                    <form action="{{ route('reviewer.store') }}" method="POST">
                                        @csrf
                                        @if (isset($hasil_review[$item->id]))
                                            @method('put')
                                        @endif
                                        {{-- {{ dd( $hasil_review) }} --}}
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <p>1. Kreatifitas :</p>
                                        <input type="number" name="nilai1" class="form-control"
                                            placeholder="Berikan nilai"
                                            value="{{ $hasil_review[$item->id]->nilai1 ?? '' }}" required>
                                        <p>2. Kesesuaian dan kemutakhiran metode penelitian :</p>
                                        <input type="number" name="nilai2" class="form-control"
                                            placeholder="Berikan nilai"
                                            value="{{ $hasil_review[$item->id]->nilai2 ?? '' }}" required>
                                        <p>3. Potensi Program :</p>
                                        <input type="number" name="nilai3" class="form-control"
                                            placeholder="Berikan nilai"
                                            value="{{ $hasil_review[$item->id]->nilai3 ?? '' }}" required>
                                        <p>4. Penjadwalan Kegiatan :</p>
                                        <input type="number" name="nilai4" class="form-control"
                                            placeholder="Berikan nilai"
                                            value="{{ $hasil_review[$item->id]->nilai4 ?? '' }}" required>
                                        <p>5. Penyusunan Anggaran Biaya :</p>
                                        <input type="number" name="nilai5" class="form-control"
                                            placeholder="Berikan nilai"
                                            value="{{ $hasil_review[$item->id]->nilai5 ?? '' }}" required>
                                        <p>6. status :</p>
                                        <select name="status" class="form-select">
                                            <option value="menunggu" {{ $item->status == 'menunggu' ? 'selected' : '' }}>
                                                Menunggu</option>
                                            <option value="sedang direview"
                                                {{ $item->status == 'sedang direview' ? 'selected' : '' }}>Sedang Direview
                                            </option>
                                            <option value="sudah direview"
                                                {{ $item->status == 'sudah direview' ? 'selected' : '' }}>Sudah Direview
                                            </option>
                                            <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>
                                                Ditolak</option>
                                            <option value="lolos" {{ $item->status == 'lolos' ? 'selected' : '' }}>Lolos
                                            </option>
                                        </select>
                                        <div class="text-end mt-3">
                                </td>
                                <td>
                                    <textarea class="form-control" name="comment" placeholder="Berikan komentar" rows="15">{{ $hasil_review[$item->id]->komentar ?? '' }}</textarea>
                                    <input type="submit" class="btn 
                                    btn-success mt-2"
                                        required></input>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Belum ada proposal</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>
@endsection
