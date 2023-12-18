<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasjid extends Model
{
    use HasFactory;
    protected $table = 'kas_masjid';
    protected $fillable = [
        'urain_kas_masjid',
        'masuk',
        'keluar',
        'jenis',
    ];
}
