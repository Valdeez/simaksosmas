<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
    use HasFactory;

    protected $table = 'tbl_warta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'isi',
        'sumber',
        'dokumen'
    ];
}
