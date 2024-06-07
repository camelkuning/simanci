<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    protected $table = 'kantor';

    protected $fillable = [
        'kode_kantor',
        'nama_unit',
        'lokasi_unit',
        'nomor_ruangan'
    ];
    use HasFactory;
}
