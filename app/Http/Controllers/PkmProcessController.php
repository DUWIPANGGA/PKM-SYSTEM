<?php

namespace App\Http\Controllers;

use App\Models\PKMModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PkmProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pengajuan = PKMModel::where('id_user', Auth::user()->id)->first();
        return view('pkm-mahasiswa.index', compact(['data_pengajuan']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_pengajuan = PKMModel::where('id_user', Auth::user()->id)->first();
        // dd($data_pengajuan);
        $pengajuan = is_null($data_pengajuan) ? false : true;
        return view('pkm-mahasiswa.upload_pkm',compact(['data_pengajuan','pengajuan']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'anggota' => 'required',
            'tahun_usulan' => 'required|integer',
            'tahun_pelaksana' => 'required|integer',
            'judul_pkm' => 'required|string',
            'jenis_pkm' => 'required|string',
            'abstrak' => 'required|string',
            'dana' => 'required|integer',
            'proposal_file' => 'required|mimes:pdf',

        ]);
        // dd('macuk');
        PKMModel::create([
            'anggota' => json_encode($request->anggota),
            'tahun_usulan' => $request->tahun_usulan,
            'tahun_pelaksana' => $request->tahun_pelaksana,
            'judul_pkm' => $request->judul_pkm,
            'jenis_pkm' => $request->jenis_pkm,
            'id_user' => Auth::user()->id,
            'abstrak' => $request->abstrak,
            'dana' => $request->dana,
            'jangka_waktu' => $request->jangka_waktu,
            'diedit' => 0,
            'proposal_file' => $request->file('proposal_file')->store('proposal', 'public'),
        ]);
        return redirect()->back()->with('success', ['Data berhasil disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'anggota' => 'required',
            'tahun_usulan' => 'required|integer',
            'tahun_pelaksana' => 'required|integer',
            'judul_pkm' => 'required|string',
            'jenis_pkm' => 'required|string',
            'abstrak' => 'required|string',
            'dana' => 'required|integer',
            'proposal_file' => 'required|mimes:pdf',

        ]);
        $pkm = PKMModel::find($request->id)->update([
            'anggota' => json_encode($request->anggota),
            'tahun_usulan' => $request->tahun_usulan,
            'tahun_pelaksana' => $request->tahun_pelaksana,
            'judul_pkm' => $request->judul_pkm,
            'jenis_pkm' => $request->jenis_pkm,
            'id_user' => Auth::user()->id,
            'abstrak' => $request->abstrak,
            'dana' => $request->dana,
            // 'proposal_file' => $request->file('proposal_file')->store('proposal', 'public'),

        ]);
        return redirect()->back()->with('success', ['Data berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PKMModel::find($id)->delete();
        return redirect()->back()->with('success', ['Data berhasil dihapus!']);
    }
}
