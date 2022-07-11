<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use HasFactory;
    use SoftDeletes;

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
