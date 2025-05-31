<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaDocente extends Model
{
    use HasFactory;

    protected $table = 'asistencias_docentes';

    protected $primaryKey = 'id_asistencia';

    public $timestamps = false;

    protected $fillable = [
        'id_docente',
        'fecha',
        'hora_ingreso',
        'hora_salida',
        'minutos_atraso',
        'abandono',
    ];
}
