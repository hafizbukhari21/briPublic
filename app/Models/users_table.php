<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_table extends Model
{ 
    // use HasFactory;\

    public $table='usertable';
    protected $fillable = [
        'id', 'name', 'email','password','role','idDivisi', 'username'
    ];

    
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
}
