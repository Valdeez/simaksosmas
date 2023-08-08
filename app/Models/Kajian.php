<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kajian extends Model
{
    use HasFactory;

    protected $table = 'tbl_kajian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'tipe',
        'dokumen'
    ];
}
