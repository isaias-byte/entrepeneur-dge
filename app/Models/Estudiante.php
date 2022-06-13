<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'sexo', 'codigo', 'nrc', 'user_id',];

    public function informacionCompleta(){
        if (Estudiante::class == true)
            return true;
        return false;
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
