<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Http\Requests\StoreSeccionRequest;
use App\Http\Requests\UpdateSeccionRequest;
use Illuminate\Http\Request;
use App\Models\Alumno;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeccionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Seccion $seccion)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeccionRequest $request, Seccion $seccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seccion $seccion)
    {
        //
    }

    public function asignarAlumnos(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'seccion_id' => 'required|exists:secciones,id',
            'alumno_id' => 'required|exists:alumnos,id',
        ]);

        // Asignar el alumno a la sección
        $seccion = Seccion::find($validated['seccion_id']);
        $alumno = Alumno::find($validated['alumno_id']);

        // Verificar la relación antes de guardar
        //dd($seccion->alumnos()->attach($alumno));

        // Asignar y redirigir
        $seccion->alumnos()->attach($alumno);

        return redirect()->route('seccion.vistaAsignar')->with('success', 'Alumno asignado exitosamente.');
    }

    public function vistaAsignar()
    {
        $secciones = Seccion::with('alumnos')->get();
        $alumnos = Alumno::all();
        return view('secciones.asignar', compact('secciones', 'alumnos'));
    }
}
