<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regionalhead_cred extends Model
{
    use HasFactory;

    public $table = "regionalhead_cred";

    public $fillable= [
        "idRegionalhead", "idDivisi"
    ];
}
