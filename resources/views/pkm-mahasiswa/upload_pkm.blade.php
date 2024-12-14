@extends('layouts.dashboard')

@section('title', 'Upload Judul dan Data Anggota PKM')

@section('content')
    <h2 class="text-center">Upload Judul PKM dan Data Anggota</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (isset($success))
        <div class="alert alert-success">
            <ul>
                @foreach ($success as $a)
                    <li>{{ $a }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br><br>
    {{-- {{dd($pengajuan);}} --}}
    @if ($pengajuan)
        @method('put')
        <form action="{{ route('pkm.update', $data_pengajuan->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $data_pengajuan->id }}">
        @else
            <form action="{{ route('pkm.submit') }}" method="POST" enctype="multipart/form-data">
                @method('post')
    @endif
    @csrf
    @if (!is_null($data_pengajuan))
        <h4>Data Anggota</h4>
        <div id="anggota-section">


            @php
                $count = 0;
            @endphp
            @foreach (json_decode($data_pengajuan->anggota, true) as $item)
                <div class="anggota-row d-flex align-items-center gap-2 mb-3">

                    <label>Data Anggota:</label>
                    <input type="text" name="anggota[{{ $count }}][nim]" placeholder="NIM" class="form-control"
                        value="{{ $item['nim'] }}" required>
                    <input type="text" name="anggota[{{ $count }}][nama]" placeholder="Nama"
                        class="form-control"value='{{ $item['nama'] }}' required>
                    <select name="anggota[{{ $count }}][prodi]" value="{{ $item['prodi'] }}" class="form-select"
                        required>
                        <option value="Teknik Informatika" {{ $item['prodi'] == 'Teknik Informatika' ? 'selected' : '' }}>
                            Teknik Informatika</option>
                        <option value="Rekayasa Perangkat Lunak"
                            {{ $item['prodi'] == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat
                            Lunak</option>
                        <option value="Sistem Informasi Kota Cerdas"
                            {{ $item['prodi'] == 'Sistem Informasi Kota Cerdas' ? 'selected' : '' }}>Sistem Informasi
                            Kota Cerdas</option>
                        <option value="Keperawatan" {{ $item['prodi'] == 'Keperawatan' ? 'selected' : '' }}>Keperawatan
                        </option>
                        <option value="Teknik Mesin" {{ $item['prodi'] == 'Teknik Mesin' ? 'selected' : '' }}>Teknik
                            Mesin</option>
                        <option value="Perancangan Manufaktur"
                            {{ $item['prodi'] == 'Perancangan Manufaktur' ? 'selected' : '' }}>Perancangan Manufaktur
                        </option>
                        <option value="Teknik Pendingin & Tata Udara"
                            {{ $item['prodi'] == 'Teknik Pendingin & Tata Udara' ? 'selected' : '' }}>Teknik Pendingin
                            & Tata Udara</option>
                        <option value="Teknik Rekayasa Instrumentasi & Kontrol"
                            {{ $item['prodi'] == 'Teknik Rekayasa Instrumentasi & Kontrol' ? 'selected' : '' }}>Teknik
                            Rekayasa Instrumentasi & Kontrol</option>
                    </select>
                    <select name="anggota[{{ $count }}][role]" value="{{ $item['role'] }}" class="form-select"
                        required>
                        <option value="Ketua" {{ $item['role'] == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="Anggota 1" {{ $item['role'] == 'Anggota 1' ? 'selected' : '' }}>Anggota 1
                        </option>
                        <option value="Anggota 2" {{ $item['role'] == 'Anggota 2' ? 'selected' : '' }}>Anggota 2
                        </option>
                        <option value="Anggota 3" {{ $item['role'] == 'Anggota 3' ? 'selected' : '' }}>Anggota 3
                        </option>
                        <option value="Anggota 4" {{ $item['role'] == 'Anggota 4' ? 'selected' : '' }}>Anggota 4
                        </option>
                    </select>
                </div>
                @php
                    $count++;
                @endphp
            @endforeach
        </div>
        <div class="mb-3">
            <button type="button" id="add-anggota" class="btn btn-secondary">+</button>
            <button type="button" id="remove-anggota" class="btn btn-danger">-</button>
        </div>

        <hr>
        <h4>Data PKM</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tahun_usulan" class="form-label">Tahun Usulan</label>
                <input type="text" name="tahun_usulan" id="tahun_usulan" class="form-control"
                    value="{{ $data_pengajuan->tahun_usulan }}" placeholder="Masukkan Tahun Usulan">
            </div>

            <div class="col-md-6">
                <label for="tahun_pelaksana" class="form-label">Tahun Pelaksana</label>
                <input type="text" name="tahun_pelaksana" value="{{ $data_pengajuan->tahun_pelaksana }}"
                    id="tahun_pelaksana" class="form-control" placeholder="Masukkan Tahun Pelaksana">
            </div>
        </div>
        <br>
        <div class="mb-3">
            <label for="judul_pkm" class="form-label">Judul PKM</label>
            <input type="text" name="judul_pkm" id="judul_pkm" value="{{ $data_pengajuan->judul_pkm }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label for="jenis_pkm" class="form-label">Jenis PKM</label>
            <select name="jenis_pkm" id="jenis_pkm" class="form-control">
                <option value=""><b>Pilih Jenis PKM</b></option>
                <option value="PKM-RE" {{ $data_pengajuan->jenis_pkm == 'PKM-RE' ? 'selected' : '' }}>PKM Riset Eksakta
                    (PKM-RE)</option>
                <option value="PKM-RSH" {{ $data_pengajuan->jenis_pkm == 'PKM-RSH' ? 'selected' : '' }}>PKM Riset
                    Sosial Humaniora (PKM-RSH)</option>
                <option value="PKM-PI" {{ $data_pengajuan->jenis_pkm == 'PKM-PI' ? 'selected' : '' }}>PKM Penerapan
                    IPTEK (PKM-PI)</option>
                <option value="PKM-K" {{ $data_pengajuan->jenis_pkm == 'PKM-K' ? 'selected' : '' }}>PKM Kewirausahaan
                    (PKM-K)</option>
                <option value="PKM-KI" {{ $data_pengajuan->jenis_pkm == 'PKM-KI' ? 'selected' : '' }}>PKM Karya
                    Inovatif (PKM-KI)</option>
                <option value="PKM-VGK" {{ $data_pengajuan->jenis_pkm == 'PKM-VGK' ? 'selected' : '' }}>PKM Video
                    Gagasan Konstruktif (PKM-VGK)</option>
                <option value="PKM-AI" {{ $data_pengajuan->jenis_pkm == 'PKM-AI' ? 'selected' : '' }}>PKM Artikel
                    Ilmiah (PKM-AI)</option>
                <option value="PKM-PM" {{ $data_pengajuan->jenis_pkm == 'PKM-PM' ? 'selected' : '' }}>PKM Pengabdian
                    kepada Masyarakat (PKM-PM)</option>
                <option value="PKM-KC" {{ $data_pengajuan->jenis_pkm == 'PKM-KC' ? 'selected' : '' }}>PKM Karsa Cipta
                    (PKM-KC)</option>
                <option value="PKM-GFT" {{ $data_pengajuan->jenis_pkm == 'PKM-GTF' ? 'selected' : '' }}>PKM Gagasan
                    Futuristik Tertulis (PKM-GFT)</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="abstrak" class="form-label">Abstrak</label>
            <textarea name="abstrak" id="abstrak" rows="3" class="form-control">{{ $data_pengajuan->abstrak }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jangka_waktu">Jangka Waktu Pelaksanaan:</label>
            <input type="text" id="jangka_waktu" name="jangka_waktu" class="form-control"
                value="{{ $data_pengajuan->jangka_waktu }}" required>
        </div>
        <div class="mb-3">
            <label for="dana">Dana Pengajuan:</label>
            <input type="text" id="dana" name="dana" placeholder="*Isi sesuai proposal" class="form-control"
                value="{{ $data_pengajuan->dana }}" required>
        </div>
        <div class="mb-3">
            <label for="proposal_file">File Upload (PDF saja):</label>
            <input type="file" id="proposal_file" name="proposal_file" accept=".pdf" class="form-control"
                value="{{ asset('/public' . $data_pengajuan->proposal_file) }}">
            <div class="alert alert-info mt-2" role="alert">
                @if ($data_pengajuan->proposal_file)
                    <a href="{{ asset('storage/' . $data_pengajuan->proposal_file) }}" target="_blank"
                        class="alert-link">Download {{ basename($data_pengajuan->proposal_file) }}</a>
                @else
                    <p class="mb-0">No file uploaded</p>
                @endif
            </div>
            <small class="text-danger" id="file-error" style="display: none;">File harus dalam format PDF!</small>
        </div>

        <button type="submit" class="btn btn-warning">Update Data</button>
    @else
        <h4>Data Anggota</h4>
        <div id="anggota-section">
            <div class="anggota-row d-flex align-items-center gap-2 mb-3">
                <label>Data Anggota:</label>
                <input type="text" name="anggota[0][nim]" placeholder="NIM" class="form-control" value=""
                    required>
                <input type="text" name="anggota[0][nama]" placeholder="Nama" class="form-control" value=""
                    required>
                <select name="anggota[0][prodi]" value="" class="form-select" required>
                    <option value="Teknik Informatika" selected>Teknik Informatika</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Sistem Informasi Kota Cerdas">Sistem Informasi Kota Cerdas</option>
                    <option value="Keperawatan">Keperawatan</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Perancangan Manufaktur">Perancangan Manufaktur</option>
                    <option value="Teknik Pendingin & Tata Udara">Teknik Pendingin & Tata Udara</option>
                    <option value="Teknik Rekayasa Instrumentasi & Kontrol">Teknik Rekayasa Instrumentasi & Kontrol
                    </option>
                </select>
                <select name="anggota[0][role]" value="" class="form-select" required>
                    <option value="Ketua" selected>Ketua</option>
                    <option value="Anggota 1">Anggota 1</option>
                    <option value="Anggota 2">Anggota 2</option>
                    <option value="Anggota 3">Anggota 3</option>
                    <option value="Anggota 4">Anggota 4</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <button type="button" id="add-anggota" class="btn btn-secondary">+</button>
            <button type="button" id="remove-anggota" class="btn btn-danger">-</button>
        </div>

        <hr>
        <h4>Data PKM</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tahun_usulan" class="form-label">Tahun Usulan</label>
                <input type="text" name="tahun_usulan" id="tahun_usulan" class="form-control"
                    value="{{ old('tahun_usulan') }}" placeholder="Masukkan Tahun Usulan">
            </div>

            <div class="col-md-6">
                <label for="tahun_pelaksana" class="form-label">Tahun Pelaksana</label>
                <input type="text" name="tahun_pelaksana" value="{{ old('tahun_pelaksana') }}" id="tahun_pelaksana"
                    class="form-control" placeholder="Masukkan Tahun Pelaksana">
            </div>
        </div>
        <br>
        <div class="mb-3">
            <label for="judul_pkm" class="form-label">Judul PKM</label>
            <input type="text" name="judul_pkm" id="judul_pkm" value="{{ old('judul_pkm') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="jenis_pkm" class="form-label">Jenis PKM</label>
            <select name="jenis_pkm" id="jenis_pkm" class="form-control">
                <option value=""><b>Pilih Jenis PKM</b></option>
                <option value="PKM-RE" {{ old('jenis_pkm') == 'PKM-RE' ? 'selected' : '' }}>PKM Riset Eksakta (PKM-RE)
                </option>
                <option value="PKM-RSH" {{ old('jenis_pkm') == 'PKM-RSH' ? 'selected' : '' }}>PKM Riset Sosial
                    Humaniora (PKM-RSH)</option>
                <option value="PKM-PI" {{ old('jenis_pkm') == 'PKM-PI' ? 'selected' : '' }}>PKM Penerapan IPTEK
                    (PKM-PI)</option>
                <option value="PKM-K" {{ old('jenis_pkm') == 'PKM-K' ? 'selected' : '' }}>PKM Kewirausahaan (PKM-K)
                </option>
                <option value="PKM-KI" {{ old('jenis_pkm') == 'PKM-KI' ? 'selected' : '' }}>PKM Karya Inovatif
                    (PKM-KI)</option>
                <option value="PKM-VGK" {{ old('jenis_pkm') == 'PKM-VGK' ? 'selected' : '' }}>PKM Video Gagasan
                    Konstruktif (PKM-VGK)</option>
                <option value="PKM-AI" {{ old('jenis_pkm') == 'PKM-AI' ? 'selected' : '' }}>PKM Artikel Ilmiah
                    (PKM-AI)</option>
                <option value="PKM-PM" {{ old('jenis_pkm') == 'PKM-PM' ? 'selected' : '' }}>PKM Pengabdian kepada
                    Masyarakat (PKM-PM)</option>
                <option value="PKM-KC" {{ old('jenis_pkm') == 'PKM-KC' ? 'selected' : '' }}>PKM Karsa Cipta (PKM-KC)
                </option>
                <option value="PKM-GFT" {{ old('jenis_pkm') == 'PKM-GFT' ? 'selected' : '' }}>PKM Gagasan Futuristik
                    Tertulis (PKM-GFT)</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="abstrak" class="form-label">Abstrak</label>
            <textarea name="abstrak" id="abstrak" rows="3" class="form-control">{{ old('abstrak') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jangka_waktu">Jangka Waktu Pelaksanaan:</label>
            <input type="text" id="jangka_waktu" name="jangka_waktu" class="form-control"
                value="{{ old('jangka_waktu') }}" required>
        </div>
        <div class="mb-3">
            <label for="dana">Dana Pengajuan:</label>
            <input type="text" id="dana" name="dana" placeholder="*Isi sesuai proposal" class="form-control"
                value="{{ old('dana') }}" required>
        </div>
        <div class="mb-3">
            <label for="proposal_file">File Upload (PDF saja):</label>
            <input type="file" id="proposal_file" name="proposal_file" accept=".pdf" class="form-control"
                value="{{ old('proposal_file') }}" required>
            <small class="text-danger" id="file-error" style="display: none;">File harus dalam format PDF!</small>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan</button>

    @endif
    </form>
    <script>
        document.getElementById('add-anggota').addEventListener('click', function() {
            const anggotaSection = document.getElementById('anggota-section');
            const index = anggotaSection.children.length;

            const newRow = document.createElement('div');
            newRow.classList.add('anggota-row', 'd-flex', 'align-items-center', 'gap-2', 'mb-3');
            newRow.innerHTML = `
            <label>Data Anggota:</label>
            <input type="text" name="anggota[${index}][nim]" placeholder="NIM" class="form-control" required>
            <input type="text" name="anggota[${index}][nama]" placeholder="Nama" class="form-control" required>
            <select name="anggota[${index}][prodi]" class="form-select" required>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                <option value="Sistem Informasi Kota Cerdas">Sistem Informasi Kota Cerdas</option>
                <option value="Keperawatan">Keperawatan</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Perancangan Manufaktur">Perancangan Manufaktur</option>
                <option value="Teknik Pendingin & Tata Udara">Teknik Pendingin & Tata Udara</option>
                <option value="Teknik Rekayasa Instrumentasi & Kontrol">Teknik Rekayasa Instrumentasi & Kontrol</option>
            </select>
            <select name="anggota[${index}][role]" class="form-select" required>
                <option value="Ketua">Ketua</option>
                <option value="Anggota 1">Anggota 1</option>
                <option value="Anggota 2">Anggota 2</option>
                <option value="Anggota 3">Anggota 3</option>
                <option value="Anggota 4">Anggota 4</option>
            </select>
        `;

            anggotaSection.appendChild(newRow);
        });

        // Event untuk menghapus baris terakhir
        document.getElementById('remove-anggota').addEventListener('click', function() {
            const anggotaSection = document.getElementById('anggota-section');
            if (anggotaSection.children.length > 1) {
                anggotaSection.removeChild(anggotaSection.lastElementChild);
            }
        });
    </script>
@endsection
