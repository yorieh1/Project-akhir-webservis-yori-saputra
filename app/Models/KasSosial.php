<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasSosial extends Model
{
    use HasFactory;
    protected $fillable = [
        'uraian',
        'masuk',
        'keluar',
        'jenis',
    ];
}
