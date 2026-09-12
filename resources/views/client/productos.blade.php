@extends('layouts.client')

@section('title', 'Catálogo de Productos - SPAD')
@section('header', 'Catálogo de Productos Disponibles')

@section('content')
<div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-medium text-gray-900">Sección en Construcción</h3>
        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">Próximamente lógica</span>
    </div>

    <!-- Plantilla en blanco para cuando llegue la lógica de productos -->
    <div class="border-2 border-dashed border-gray-200 rounded-lg p-12 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
        </svg>
        <h4 class="mt-2 text-sm font-medium text-gray-900">No hay productos listados todavía</h4>
        <p class="mt-1 text-sm text-gray-500">Esta vista está preparada a la espera de la lógica de inventario y catálogo.</p>
    </div>
</div>
@endsection