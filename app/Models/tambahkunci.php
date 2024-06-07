<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahkunci extends Model
{
    protected $table = 'kunci';

    protected $fillable = [
        'id_kunci',
        'nama_kunci',
        'kode_kantor',
        'status',
    
    ];
    use HasFactory;
}
