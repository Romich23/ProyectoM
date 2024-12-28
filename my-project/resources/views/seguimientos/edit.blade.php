<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seguimientos') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md mx-auto flex flex-col items-center">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Actualizar Seguimiento</h2>
        <form action="{{ route('seguimientos.update', ['id' => $seguimiento['seguimiento']->id])}}" method="POST" class="space-y-4 w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Campo Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Estado</label>
                <input type="text" id="estado" name="estado" value="{{$seguimiento['seguimiento']->estado}}"
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