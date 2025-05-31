<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $primaryKey = 'id_curso';

    public $timestamps = false;

    protected $fillable = [
        'grado',
        'paralelo',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'id_curso', 'id_curso');
    }
}