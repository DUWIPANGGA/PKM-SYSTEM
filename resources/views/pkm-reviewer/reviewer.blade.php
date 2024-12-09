@extends('layouts.main') <!-- Pastikan layout utama sudah ada -->

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
        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Data Mahasiswa</th>
                        <th>Jenis / Judul</th>
                        <th>File Proposal</th> <!-- Tambahkan kolom baru -->
                        <th>Total Nilai</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($proposal_user)>0)
                    
                    <tr>
                    <tr>
                        @foreach ($proposal_user as $item)
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->nim }} <br>
                                {{ $item->name }} <br>
                                {{ $item->prodi }}<br>
                                

                            </td>
                            <td>
                                {{ $item->jenis_pkm }}:{{ $item->judul_pkm }} <br>
                                {{ $item->abstrak }}
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $item->proposal_file) }}" target="_blank"
                                    class="btn btn-primary">
                                    Lihat Proposal
                                </a>
                                <div class="alert {{$hasil_review[$item->id_pkm ] == 'menunggu' ? 'alert-danger' : 'alert-success' }} mt-2 p-1">
                                    {{ $item->status }}
                                </div>
                            </td>
                            <td>
                                
                                <form action="{{ route('reviewer.store') }}" method="POST">
                                    @csrf
                                    @if(isset($hasil_review[$item->id_pkm ]))
                                        @method('put')
                                    @endif
                                    <input type="hidden" name="id" value="{{ $item->id_pkm }}">
                                    <p>1. Kreatifitas :</p>
                                    <input type="number" name="nilai1" class="form-control" placeholder="Berikan nilai"
                                         value="{{ $hasil_review[$item->id_pkm]->nilai1 ?? '' }}" required>
                                    <p>2. Kesesuaian dan kemutakhiran metode penelitian :</p>
                                    <input type="number" name="nilai2" class="form-control" placeholder="Berikan nilai"
                                    value="{{ $hasil_review[$item->id_pkm]->nilai2?? '' }}" required>
                                    <p>3. Potensi Program :</p>
                                    <input type="number" name="nilai3" class="form-control" placeholder="Berikan nilai"
                                    value="{{ $hasil_review[$item->id_pkm]->nilai3?? '' }}" required>
                                    <p>4. Penjadwalan Kegiatan :</p>
                                    <input type="number" name="nilai4" class="form-control" placeholder="Berikan nilai"
                                    value="{{ $hasil_review[$item->id_pkm]->nilai4?? '' }}" required>
                                    <p>5. Penyusunan Anggaran Biaya :</p>
                                    <input type="number" name="nilai5" class="form-control" placeholder="Berikan nilai"
                                    value="{{ $hasil_review[$item->id_pkm]->nilai5?? '' }}" required>
                                    <div class="text-end mt-3">
                            </td>
                            <td>
                                <textarea class="form-control" name="comment" placeholder="Berikan komentar" rows="15">{{ $hasil_review[$item->id_pkm]->komentar?? '' }}</textarea>
                                <input type="submit"  class="btn btn-success" required></input>
                                </form>
                            </td>
                        @endforeach

                    </tr>
                    </tr>
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
