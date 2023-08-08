<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $table = 'tbl_modul';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'deskripsi',
        'tipe',
        'dokumen'
    ];
}
