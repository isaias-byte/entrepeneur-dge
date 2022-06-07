<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'nombre'
    // ];

    public $table = 'roles';
    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    //menu para cada rol

    public static function rolId($rolName)
    {
        return Rol::where('rol', $rolName)->first()->id;
    }
}
