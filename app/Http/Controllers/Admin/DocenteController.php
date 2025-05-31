<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\AsistenciaDocente;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::paginate(10);
        return view('admin.docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('admin.docentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|string|max:20',
            'nombres' => 'required|string|max:255',
            'apell_paterno' => 'required|string|max:255',
            'apell_materno' => 'required|string|max:255',
            'carga_horaria' => 'required|integer',
        ]);

        Docente::create($request->all());

        return redirect()->route('admin.docentes.index')->with('success', 'Docente creado correctamente.');
    }

    public function edit($id_docente)
    {
        $docente = Docente::findOrFail($id_docente);
        return view('admin.docentes.edit', compact('docente'));
    }

   public function update(Request $request, $id_docente)
    {
        $docente = Docente::findOrFail($id_docente);
        $request->validate([
            'ci' => 'required|string|max:20',
            'nombres' => 'required|string|max:255',
            'apell_paterno' => 'required|string|max:255',
            'apell_materno' => 'required|string|max:255',
            'carga_horaria' => 'required|integer',
        ]);
        $docente->update($request->all());
        return redirect()->route('admin.docentes.index')->with('success', 'Docente actualizado correctamente.');
    }

    public function destroy($id_docente)
    {
        $docente = Docente::findOrFail($id_docente);
        $docente->delete();
        return redirect()->route('admin.docentes.index')->with('success', 'Docente eliminado correctamente.');
    }

    public function asistencia(Docente $docente)
    {
    $asistencias = AsistenciaDocente::where('id_docente', $docente->id_docente)->paginate(10);
    
    return view('admin.docentes.asistencia', compact('docente', 'asistencias'));
    }
}
