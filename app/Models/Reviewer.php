<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviewer extends Model
{
    use HasFactory;

    protected $table = 'reviewer';

    protected $fillable = [
        'id_user',
        'id_pkm',
        'komentar',
        'nilai1',
        'nilai2',
        'nilai3',
        'nilai4',
        'nilai5',
        'skor',
        'status',
    ];
}
