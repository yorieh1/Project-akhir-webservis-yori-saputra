<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasSosial extends Model
{
    use HasFactory;
    protected $table = 'kas_sosial';
    protected $fiilable = [
        'urain_kas_sosial',
        'masuk',
        'keluar',
        'jenis',
    ];
}
