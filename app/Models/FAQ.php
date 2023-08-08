<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'tbl_faq';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'kategori'
    ];
}
