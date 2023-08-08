<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dummy extends Model
{
    use HasFactory;

    protected $table = 'dummy';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'umur',
        'pekerjaan',
        'tahun',
        'bulan'
    ];
}
