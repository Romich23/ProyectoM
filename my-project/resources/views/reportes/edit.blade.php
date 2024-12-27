<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reportes') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md mx-auto flex flex-col items-center">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Actualizar Reporte</h2>
        <form action="{{ route('reportes.update', ['id' => $reporte['reporte']->id])}}" method="POST" class="space-y-4 w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Campo Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{$reporte['reporte']->Nombre}}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <!-- Campo Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
               <input id="descripcion" name="descripcion"  rows="4" value="{{$reporte['reporte']->Descripción}}"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></input>
            </div>

            <!-- Campo Nivel de Riesgo -->
            <div>
                <label for="nivel-riesgo" class="block text-sm font-medium text-gray-700">Nivel de Riesgo</label>
                <select id="nivel-riesgo" name="nivel-riesgo"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="bajo" {{ $reporte['reporte']->NivelRiesgo == 'bajo' ? 'selected' : '' }}>Bajo</option>
                        <option value="medio" {{ $reporte['reporte']->NivelRiesgo == 'medio' ? 'selected' : '' }}>Medio</option>
                        <option value="alto" {{ $reporte['reporte']->NivelRiesgo == 'alto' ? 'selected' : '' }}>Alto</option>

                </select>
            </div>

            <!-- Campo Fecha -->
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="fecha" name="fecha" value="{{$reporte['reporte']->Fecha}}"
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

    </div>
    </div>
</x-app-layout>
