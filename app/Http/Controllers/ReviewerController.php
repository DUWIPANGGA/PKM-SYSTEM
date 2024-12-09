<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\User;
use App\Models\PKMModel;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasil_review = [];
        $proposal_user = PKMModel::join('users', 'pkm.id_user', '=', 'users.id')
            ->select('pkm.*', 'pkm.id AS id_pkm', 'users.*')
            ->where('pkm.id_user', Auth::user()->id)
            ->get();
        $hasil_review = [];
        foreach ($proposal_user as $proposal) {
            $result = Reviewer::where("id_pkm", $proposal->id_pkm)->first();
            if ($result) {
                $hasil_review[$proposal->id_pkm] = $result;
            }
        }
        return view('pkm-reviewer.reviewer', compact(['proposal_user', 'hasil_review', 'hasil_review']));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'nilai1' => 'required|numeric',
            'nilai2' => 'required|numeric',
            'nilai3' => 'required|numeric',
            'nilai4' => 'required|numeric',
            'nilai5' => 'required|numeric',
            'comment' => 'required|string'
        ]);
        $skor = ($request->nilai1 + $request->nilai2 + $request->nilai3 + $request->nilai4 + $request->nilai5) / 5;
        $result = Reviewer::create([
            'id_user' => Auth::user()->id,
            'id_pkm' => $request->id,
            'nilai1' => $request->nilai1,
            'nilai2' => $request->nilai2,
            'nilai3' => $request->nilai3,
            'nilai4' => $request->nilai4,
            'nilai5' => $request->nilai5,
            'komentar' => $request->comment,
            'skor' => $skor,
        ]);
        $pkm = PKMModel::find($request->id); // Ambil instance PKMModel berdasarkan ID

        if ($pkm) {
            $pkm->status = 'sudah direview';
            $pkm->save();
        }
        if ($result) {
            return redirect()->route('reviewer.dashboard')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('reviewer.dashboard')->with('error', 'Data gagal disimpan');
        }
    }
    private function mapToLetter($value)
    {
        // Map 0-100 to 0-10
        $mappedValue = $value * 0.1;

        // Determine letter grade
        if ($mappedValue >= 8) {
            return 'A';
        } elseif ($mappedValue >= 6) {
            return 'B';
        } elseif ($mappedValue >= 4) {
            return 'C';
        } elseif ($mappedValue >= 2) {
            return 'D';
        } else {
            return 'E';
        }
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $nilai_huruf = new stdClass();
        $proposal = PKMModel::where('id_user', Auth::user()->id)->first();
        if ($proposal) {
            $hasil_review = Reviewer::where('id_pkm', $proposal->id)->first();
            $nilai_huruf->nilai1 = $this->mapToLetter($hasil_review->nilai1);
            $nilai_huruf->nilai2 = $this->mapToLetter($hasil_review->nilai2);
            $nilai_huruf->nilai3 = $this->mapToLetter($hasil_review->nilai3);
            $nilai_huruf->nilai4 = $this->mapToLetter($hasil_review->nilai4);
            $nilai_huruf->nilai5 = $this->mapToLetter($hasil_review->nilai5);
            return view('pkm-mahasiswa.nilaiReviewer', compact(['hasil_review', 'proposal', 'nilai_huruf']));
        } else {
            $hasil_review = new stdClass(); 
            return view('pkm-mahasiswa.nilaiReviewer', compact(['hasil_review', 'proposal', 'nilai_huruf']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $skor = ($request->nilai1 + $request->nilai2 + $request->nilai3 + $request->nilai4 + $request->nilai5) / 5;
        Reviewer::where('id_pkm', $request->id)->update([
            'nilai1' => $request->nilai1,
            'nilai2' => $request->nilai2,
            'nilai3' => $request->nilai3,
            'nilai4' => $request->nilai4,
            'nilai5' => $request->nilai5,
            'komentar' => $request->comment,
            'skor' => $skor,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
