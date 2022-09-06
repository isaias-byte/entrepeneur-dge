<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Embajador extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','nombre', 'apellido_paterno', 'apellido_materno', 'telefono', 'profesor_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
}
