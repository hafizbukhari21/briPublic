<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    // use HasFactory;

    public $table = "task";
    public $fillable = [
        "idUserAsPic","idDivisi","jenis_pekerjaan","status","keterangan","job", "penanggung_jawab"
    ];
}
