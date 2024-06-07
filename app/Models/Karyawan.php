<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'id_karyawan  ',
        'nama_karyawan',
        'kode_jabatan ',
        'no_tlp_karyawan'
    ];
    use HasFactory;
}
