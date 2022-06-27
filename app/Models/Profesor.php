<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nrc_id','nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'sexo', 'codigo',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nrcs() {
        return $this->belongsToMany(Nrc::class);
    }

}
