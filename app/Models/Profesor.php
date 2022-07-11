<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profesor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id','nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'sexo', 'codigo',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNombreCompletoAttribute() {
        return $this->nombre . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
    }

    public function nrcs() {
        return $this->belongsToMany(Nrc::class);
    }
}
