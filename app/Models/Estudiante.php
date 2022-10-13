<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'sexo', 'codigo', 'nrc', 'pitch', 'plan_negocios', 'embajador', 'user_id', 'profesor_id',];

    public function informacionCompleta(){
        if (Estudiante::class == true)
            return true;
        return false;
    }
    
    // public function

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNombreCompletoAttribute() {
        return $this->nombre . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
    }
}
