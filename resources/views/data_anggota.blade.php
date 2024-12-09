@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Data Anggota</h2>
    <br>
    <form action="{{ route('data_anggota.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="anggota-section">
            <div class="anggota-row d-flex align-items-center gap-2 mb-3">
                <label>Data Anggota:</label>
                <input type="text" name="anggota[0][nim]" placeholder="NIM" class="form-control" required>
                <input type="text" name="anggota[0][nama]" placeholder="Nama" class="form-control" required>
                <select name="anggota[0][prodi]" class="form-select" required>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Sistem Informasi Kota Cerdas">Sistem Informasi Kota Cerdas</option>
                    <option value="Keperawatan">Keperawatan</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Perancangan Manufaktur">Perancangan Manufaktur</option>
                    <option value="Teknik Pendingin & Tata Udara">Teknik Pendingin & Tata Udara</option>
                    <option value="Teknik Rekayasa Instrumentasi & Kontrol">Teknik Rekayasa Instrumentasi & Kontrol</option>
                </select>
                <select name="anggota[0][role]" class="form-select" required>
                    <option value="Ketua">Ketua</option>
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

        <h4>Input Data PKM</h4>
        <div class="mb-3">
            <label for="jangka_waktu">Jangka Waktu Pelaksanaan:</label>
            <input type="text" id="jangka_waktu" name="jangka_waktu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dana">Dana Pengajuan:</label>
            <input type="number" id="dana" name="dana" placeholder="*Isi sesuai proposal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="proposal_file">File Upload (PDF saja):</label>
            <input type="file" id="proposal_file" name="proposal_file" accept=".pdf" class="form-control" required>
            <small class="text-danger" id="file-error" style="display: none;">File harus dalam format PDF!</small>
        </div>

        <button type="submit" class="btn btn-primary">Upload Proposal</button>
    </form>
</div>

<script>
    // Event untuk menambah anggota
    document.getElementById('add-anggota').addEventListener('click', function () {
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
    document.getElementById('remove-anggota').addEventListener('click', function () {
        const anggotaSection = document.getElementById('anggota-section');
        if (anggotaSection.children.length > 1) {
            anggotaSection.removeChild(anggotaSection.lastElementChild);
        }
    });

    // Validasi File Upload
    document.getElementById('proposal_file').addEventListener('change', function () {
        const file = this.files[0];
        const fileError = document.getElementById('file-error');

        if (file && file.type !== 'application/pdf') {
            fileError.style.display = 'block';
            this.value = ''; // Reset input file
        } else {
            fileError.style.display = 'none';
        }
    });
</script>
@endsection
