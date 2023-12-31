<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'tbl_laporan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'deskripsi',
        'tipe',
        'dokumen'
    ];
}
