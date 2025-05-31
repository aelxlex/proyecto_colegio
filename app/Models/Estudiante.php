<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $primaryKey = 'id_estudiante';

    public $timestamps = false; // Ajusta según tu tabla

    protected $fillable = [
        'ci',
        'nombres',
        'apell_paterno',
        'apell_materno',
        'nombre_tutor',
        'telefono_tutor',
        'id_curso', 
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }

}

