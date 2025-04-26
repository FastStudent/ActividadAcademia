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

    public function asignarAlumnos(Request $request, Seccion $seccion)
{
    // Valida los datos recibidos desde el formulario
    $request->validate([
        'alumno_id' => 'required|array', // Asegúrate de que se reciban múltiples IDs de alumnos
        'alumno_id.*' => 'exists:alumnos,id', // Asegura que cada alumno exista
    ]);

    // Asigna los alumnos seleccionados a la sección
    $seccion->alumnos()->attach($request->alumno_id);

    $seccion = Seccion::find(1); // o cualquier lógica para elegir una sección

    return view('dashboard', [
        'seccion' => $seccion,
        'alumnos' => Alumno::all(),
    ]);

    // Redirige con un mensaje de éxito
    return redirect()->route('secciones.show', $seccion)->with('success', 'Alumnos asignados correctamente.');
}
}
