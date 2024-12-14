@extends('layouts.dashboard')

@section('title', 'Data Nilai Proposal')

@section('content')
    <div class="container mt-4">
        <h2>Data Nilai Proposal</h2>
        <p>Data penilaian oleh reviewer</p>
        <hr>

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-success">Cetak</button>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Keterangan</th>
                        <th>Nilai</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>
                            Kreatifitas : <br>
                            <small>Gagasan (orisinalitas, unik dan bermanfaat)</small>
                        </td>
                        <td contenteditable="true">{{ $hasil_review->nilai1 ?? '' }}</td>
                        <td contenteditable="true">{{ $nilai_huruf->nilai1 ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Kesesuaian dan kemutakhiran metode penelitian</td>
                        <td contenteditable="true">{{ $hasil_review->nilai2 ?? '' }}</td>
                        <td contenteditable="true">{{ $nilai_huruf->nilai2 ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Potensi Program :</td>
                        <td contenteditable="true">{{ $hasil_review->nilai3 ?? '' }}</td>

                        <td contenteditable="true">{{ $nilai_huruf->nilai3 ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Penjadwalan Kegiatan</td>

                        <td contenteditable="true">{{ $hasil_review->nilai4 ?? '' }}</td>
                        <td contenteditable="true">{{ $nilai_huruf->nilai4 ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>Penyusunan Anggaran Biaya :</td>

                        <td contenteditable="true">{{ $hasil_review->nilai5 ?? '' }}</td>
                        <td contenteditable="true">{{ $nilai_huruf->nilai5 ?? '' }}</td>
                    </tr>
                    
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Catatan :</h5>
                    <p class="card-text">{{  $hasil_review->komentar }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>

        <p class="mt-3">Keterangan: <span>{{ $proposal->status ?? '' }}</span> <br> Skor:
            <span>{{ $hasil_review->skor ?? '' }}</span></p>
    </div>
@endsection
