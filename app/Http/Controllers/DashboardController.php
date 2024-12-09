<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'new_proposals' => 0,
            'approved_proposals' => 4,
            'funded_proposals' => 3,
            'Partisipan_Mahasiswa' => [
                'TI' => 6,
                'RPL' => 5,
                'SICK' => 7,
                'TRIK' => 3,
                'TPTU' => 2,
                'TM' => 4,
                'PM' => 2,
                'Keperawatan' => 2,

            ],
            'Partisipan_Dosen' => [
                'Teknik Informatika' => 6,
                'Teknik Mesin' => 5,
                'Teknik Pendingin & Tata Udara' => 3,
                'Keperawatan' => 2,
            ]
        ];

        return view('dashboard.index', compact('data'));
    }
}
