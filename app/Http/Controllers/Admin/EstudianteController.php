<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\Curso;

class EstudianteController extends Controller
{

    public function index(Request $request)
    {
        $grado = $request->grado;
        $paralelo = $request->seccion;

    
        $query = Estudiante::with('curso');

        if ($grado) {
            $query->whereHas('curso', function ($q) use ($grado) {
                $q->where('grado', $grado);
            });
        }

        if ($paralelo) {
            $query->whereHas('curso', function ($q) use ($paralelo) {
                $q->where('paralelo', $paralelo);
            });
        }

        $estudiantes = $query->paginate(10)->appends($request->all());

        return view('admin.estudiantes.index', compact('estudiantes', 'grado', 'paralelo'));
    }



    public function create()
    {
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('admin.estudiantes.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|string|max:20',
            'nombres' => 'required|string|max:255',
            'apell_paterno' => 'required|string|max:255',
            'apell_materno' => 'required|string|max:255',
            'nombre_tutor' => 'required|string|max:255',
            'telefono_tutor' => 'required|string|max:20',
            'id_curso' => 'required|exists:cursos,id_curso',
        ]);

        Estudiante::create($request->all());
        
        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }

    public function edit($id_estudiante)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);
        $cursos = Curso::all();
        return view('admin.estudiantes.edit', compact('estudiante', 'cursos'));
    }

    public function update(Request $request, $id_estudiante)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);

        $request->validate([
            'ci' => 'required|string|max:20',
            'nombres' => 'required|string|max:255',
            'apell_paterno' => 'required|string|max:255',
            'apell_materno' => 'required|string|max:255',
            'nombre_tutor' => 'required|string|max:255',
            'telefono_tutor' => 'required|string|max:20',
            'id_curso' => 'required|exists:cursos,id_curso',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy($id_estudiante)
    {
        $estudiante = Estudiante::findOrFail($id_estudiante);
        $estudiante->delete();

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
