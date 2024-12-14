<?php

namespace App\Http\Controllers;

use App\Models\PKMModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class PkmProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_pengajuan = PKMModel::all()->count();
        $total_pengajuan_menunggu = PKMModel::where('status', 'menunggu')->count();
        $total_pengajuan_selain_menunggu = PKMModel::where('status', '!=', 'menunggu')->count();
        $persentase_menunggu = ($total_pengajuan_menunggu / $total_pengajuan) * 100;
        $persentase_selain_menunggu = ($total_pengajuan_selain_menunggu / $total_pengajuan) * 100;

        $total_pengajuan_lolos = PKMModel::where('status', 'lolos')->count();
        $total_pengajuan_baru = PKMModel::where('status', 'menunggu')->count();
        $total_pengajuan_didanai = PKMModel::where('status', 'didanai')->count();
        $total_pengajuan_ditolak = PKMModel::where('status', 'ditolak')->count();
        $data = DB::table('pkm')->pluck('anggota');
        $jenis_pkm = DB::table('pkm')->pluck('jenis_pkm');
        $pkmCounts = [];
        foreach ($jenis_pkm as $jenis) {
            if (isset($pkmCounts[$jenis])) {
                $pkmCounts[$jenis]++;
            } else {
                $pkmCounts[$jenis] = 1;
            }
        }
        $prodiCounts = [];

        foreach ($data as $jsonData) {
            $anggotaList = json_decode($jsonData, true); // Decode JSON per baris

            foreach ($anggotaList as $anggota) {
                $prodi = $anggota['prodi']; // Ambil prodi
                if (isset($prodiCounts[$prodi])) {
                    $prodiCounts[$prodi]++;
                } else {
                    $prodiCounts[$prodi] = 1;
                }
            }
        }

        return view('public.dashboard', compact(['total_pengajuan', 'total_pengajuan_lolos', 'total_pengajuan_baru', 'total_pengajuan_didanai', 'total_pengajuan_ditolak', 'persentase_selain_menunggu', 'prodiCounts', 'pkmCounts']));
    }
    public function dashboard()
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
        return view('pkm-mahasiswa.upload_pkm', compact(['data_pengajuan', 'pengajuan']));
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
    public function edit(string $id) {}

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
    ]);

    $pkm = PKMModel::find($id);

    if ($pkm->proposal_file) {
        $filePath = $pkm->proposal_file;
                $result = Storage::disk('public')->delete($filePath);
        
        if (!$result) {
            dd("Failed to delete file: " . $filePath);
        }
    }
    $proposalPath = $request->file('proposal_file')->store('proposal', 'public');

    $pkm->update([
        'proposal_file' => $proposalPath,
        'anggota' => json_encode($request->anggota),
        'tahun_usulan' => $request->tahun_usulan,
        'tahun_pelaksana' => $request->tahun_pelaksana,
        'judul_pkm' => $request->judul_pkm,
        'jenis_pkm' => $request->jenis_pkm,
        'id_user' => Auth::user()->id,
        'abstrak' => $request->abstrak,
        'dana' => $request->dana,
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
