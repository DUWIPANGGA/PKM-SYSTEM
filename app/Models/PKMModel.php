<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PKMModel extends Model
{
    use HasFactory;

    protected $table = 'pkm';

    protected $fillable = [
        'anggota',
        'tahun_usulan',
        'tahun_pelaksana',
        'judul_pkm',
        'id_user',
        'jenis_pkm',
        'abstrak',
        'dana',
        'status ',
        'diedit',
        'jangka_waktu',
        'proposal_file',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');

    }
}
