@extends('home.index')

@section('title', 'Reportes del ITCh')

@section('content')
    <!-- Grupo de Cards -->
    <div class="mt-8 w-full max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="https://via.placeholder.com/150" alt="Imagen" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">Título de la Card</h3>
                <p class="text-gray-600">Descripción breve para esta card.</p>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="https://via.placeholder.com/150" alt="Imagen" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">Título de la Card</h3>
                <p class="text-gray-600">Otra descripción breve para esta card.</p>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="https://via.placeholder.com/150" alt="Imagen" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">Título de la Card</h3>
                <p class="text-gray-600">Más información sobre esta card.</p>
            </div>
        </div>
    </div>
@endsection

