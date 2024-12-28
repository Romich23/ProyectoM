<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de reportes') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <!-- Tabla de Datos -->
      <div class="overflow-x-auto p-5">
        <table class="min-w-full bg-white border  rounded-lg">
          <thead class="bg-indigo-600 text-white">
            <tr>
              <th class="px-6 py-3 border-b   text-left text-xs font-medium  uppercase tracking-wider">Imagen</th>
              <th class="px-6 py-3 border-b   text-left text-xs font-medium  uppercase tracking-wider">Nombre</th>
              <th class="px-6 py-3 border-b   text-left text-xs font-medium  uppercase tracking-wider">Descripcion</th>
              <th class="px-6 py-3 border-b   text-left text-xs font-medium  uppercase tracking-wider">Fecha</th>
              <th class="px-6 py-3 border-b   text-left text-xs font-medium  uppercase tracking-wider">Nivel</th>
              <th class="px-6 py-3 border-b   text-left text-xs font-medium  uppercase tracking-wider">Estado</th>
              <th class="px-6 py-3 border-b   text-left text-xs font-medium  uppercase tracking-wider">Actualizar estado</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reportes['reportes'] as $reporte)
            <form method="POST" action="{{route('brigadista.update', ["id" => $reporte->id])}}">
                @csrf
                @method('PATCH')
                <tr class="bg-white hover:bg-gray-100">
                  <td class="px-6 py-4 border-b  text-sm text-gray-700">
                    <img src="{{ asset('/storage/'.$reporte->imagen) }}" class="card-img-top" width="150px" height="150px" alt="...">
                  </td>
                  <td class="px-6 py-4 border-b  text-sm text-gray-700">{{$reporte->Nombre}}</td>
                  <td class="px-6 py-4 border-b  text-sm text-gray-700">{{$reporte->Descripción}}</td>
                  <td class="px-6 py-4 border-b  text-sm text-gray-700">{{$reporte->Fecha}}</td>
                  <td class="px-6 py-4 border-b  text-sm text-gray-700">{{$reporte->NivelRiesgo}}</td>
                  <td class="px-6 py-4 border-b  text-sm text-gray-700">
                    <select id="estado" name="estado"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">{{$reporte->seguimiento->estado}}</option>
                        @foreach($reportes['seguimientos_reporte'] as $seguimiento)
                        <option value="{{$seguimiento->id}}">{{$seguimiento->estado}}</option>
                        @endforeach
                    </select>
                  </td>
                  <td class="px-6 py-4">
                    <button class="bg-indigo-600 text-white px-2 py-1 rounded hover:bg-yellow-500 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300">
                        Actualizar
                    </button>
                  </td>
                </tr>
            </form>
            @endforeach
            <!-- Más filas si es necesario -->
          </tbody>
        </table>
      </div>
    </div>
</x-app-layout>