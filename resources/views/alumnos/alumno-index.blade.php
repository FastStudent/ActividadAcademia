<x-layouts.app :title="__('Info Alumno')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-neutral-900">

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-neutral-800">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Nombre</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Correo</th>
                            <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Secciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($alumnos as $alumno)
                            <tr class="hover:bg-gray-50 dark:hover:bg-neutral-800">
                                <td class="px-4 py-2">
                                    <a href="{{ route('alumno.show', $alumno) }}" class="text-blue-600 hover:underline dark:text-blue-400">
                                        {{ $alumno->nombre }}
                                    </a>
                                </td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                                    {{ $alumno->correo }}
                                </td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-300">
                                    @foreach ($alumno->secciones as $seccion)
                                        <div>{{ $seccion->nombre }} - {{ $seccion->seccion }}</div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-layouts.app>
