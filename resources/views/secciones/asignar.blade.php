<x-layouts.app :title="__('Asignar Alumnos a Secciones')">
    <div class="p-6 space-y-6">

        <h1 class="text-2xl font-bold">Asignar Alumnos a Secciones</h1>

        {{-- Formulario para asignar --}}
        <form action="{{ route('seccion.asignarAlumnos') }}" style="background-color: black;" method="POST" class="space-y-4 bg-white p-4 rounded shadow">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="seccion_id" class="block font-semibold">Sección</label>
                    <select name="seccion_id" id="seccion_id" style="background-color: black;" class="w-full border rounded p-2">
                        @foreach ($secciones as $seccion)
                            <option value="{{ $seccion->id }}">{{ $seccion->nombre }} - {{ $seccion->seccion }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="alumno_id" class="block font-semibold">Alumno</label>
                    <select name="alumno_id" id="alumno_id" style="background-color: black;" class="w-full border rounded p-2">
                        @foreach ($alumnos as $alumno)
                            <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Asignar</button>
        </form>

        {{-- Lista de alumnos por sección --}}
        <h2 class="text-xl font-semibold mt-8">Alumnos por Sección</h2>
        <div style="background-color: black;" class="overflow-x-auto">
            <table style="background-color: black;" class="w-full table-auto border border-collapse mt-4 bg-white rounded shadow">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="border px-4 py-2">Sección</th>
                        <th class="border px-4 py-2">Alumnos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($secciones as $seccion)
                        <tr>
                            <td class="border px-4 py-2">{{ $seccion->nombre }} - {{ $seccion->seccion }}</td>
                            <td class="border px-4 py-2">
                                @forelse ($seccion->alumnos as $alumno)
                                    {{ $alumno->nombre }}<br>
                                @empty
                                    <span class="text-gray-400 italic">Sin alumnos</span>
                                @endforelse
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-layouts.app>
