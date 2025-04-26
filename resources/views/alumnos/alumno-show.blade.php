<x-layouts.app :title="__('Info Alumno')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div style="background-color: black;" class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900">

            {{-- Información del Alumno --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $alumno->nombre }}</h1>
                <ul class="text-gray-700 dark:text-gray-300 space-y-1">
                    <li><strong>Correo:</strong> {{ $alumno->correo }}</li>
                    <li><strong>Código:</strong> {{ $alumno->codigo }}</li>
                </ul>
            </div>

            <hr class="my-6 border-gray-300 dark:border-gray-600" />

            {{-- Materias inscritas --}}
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Materias a las que está inscrito</h2>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300">
                    @foreach ($alumno->secciones as $seccion)
                        <li>{{ $seccion->nombre }} - {{ $seccion->seccion }}</li>
                    @endforeach
                </ul>
            </div>

            <hr class="my-6 border-gray-300 dark:border-gray-600" />

            {{-- Formulario para inscribir --}}
            <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Inscribir a Sección</h2>
                <form action="{{ route('alumno.actualizar-secciones', $alumno) }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="seccion_id" class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Selecciona secciones:</label>
                        <select name="seccion_id[]" id="seccion_id" multiple class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-neutral-800 dark:text-white">
                            @foreach ($secciones as $seccion)
                                <option value="{{ $seccion->id }}" @selected(array_search($seccion->id, $alumno->secciones->pluck('id')->toArray()) !== false)>
                                    {{ $seccion->nombre }} - {{ $seccion->seccion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" style="background-color: black; color: white;" class="btn btn-primary">
                            Inscribir
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-layouts.app>


