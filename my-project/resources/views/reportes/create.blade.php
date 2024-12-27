<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reportes') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md mx-auto flex flex-col items-center">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Formulario de Reporte</h2>
        <form action="{{ route('reportes.store') }}" method="POST" class="space-y-4 w-full" enctype="multipart/form-data">
            @csrf
            <!-- Campo Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Campo Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>

            <!-- Campo Nivel de Riesgo -->
            <div>
                <label for="nivel-riesgo" class="block text-sm font-medium text-gray-700">Nivel de Riesgo</label>
                <select id="nivel-riesgo" name="nivel-riesgo"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="bajo">Bajo</option>
                    <option value="medio">Medio</option>
                    <option value="alto">Alto</option>
                </select>
            </div>

            <!-- Campo Fecha -->
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="fecha" name="fecha"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Campo Imagen -->
            <div>
                <label for="imagen" class="block text-sm font-medium text-gray-700">Subir Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/*"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Botón Enviar -->
            <div>
                <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Enviar
                </button>
            </div>
        </form>
    </div>
      <!-- Tabla de Datos -->
      <div class="mt-8 w-full max-w-4xl mx-auto">
        <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden ">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Nivel de Riesgo</th>
                    <th class="px-4 py-2">Estado</th>
                    <th class="px-4 py-2">Editar</th>
                    <th class="px-4 py-2">Eliminar</th>


                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($reportes['reportes'] as $reporte)
                <tr class="bg-gray-100 border-b">
                    <td class="px-4 py-2">{{$reporte->Nombre}}</td>
                    <td class="px-4 py-2">{{$reporte->Descripción}}</td>
                    <td class="px-4 py-2">{{$reporte->Fecha}}</td>
                    <td class="px-4 py-2">{{$reporte->NivelRiesgo}}</td>
                    <td class="px-4 py-2">{{$reporte->seguimiento_id}}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('reportes.edit', ['id' => $reporte->id])}}" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300">
                            ✏️ Editar
                        </a>

                    </td>
                    <td class="px-4 py-2 text-center">
                        <form method="POST" action="{{ route('reportes.destroy', ['id' => $reporte->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-400 text-white px-2 py-1 rounded hover:bg-yellow-500 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300">
                            Eliminar
                        </button>
                        </form>

                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
</x-app-layout>
