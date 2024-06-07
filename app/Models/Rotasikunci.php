<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rotasikunci extends Model
{
    protected $table = 'rotasikunci';
    protected $primaryKey = 'no_rotasi';
    protected $fillable = [
        'no_rotasi',
        'id_kunci',
        'id_karyawan',
        'id_karyawan_pengembali',
        'id_satpam',
        'waktu_peminjaman',
        'waktu_pengembalian',
        'status_kunci'
    ];
    use HasFactory;
}
