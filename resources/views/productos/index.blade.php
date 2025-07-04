@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <h2 class="text-2xl font-bold text-center mb-5">Categorías</h2>
    <div class="row justify-content-center g-4">
        @php
            $categorias = [
                ['slug' => 'bebidas', 'nombre' => 'Bebidas', 'icon' => 'bi-cup-straw'],
                ['slug' => 'abarrotes', 'nombre' => 'Abarrotes', 'icon' => 'bi-basket3-fill'],
                ['slug' => 'snacks', 'nombre' => 'Snacks', 'icon' => 'bi-emoji-smile-fill'],
                ['slug' => 'limpieza', 'nombre' => 'Limpieza', 'icon' => 'bi-bucket-fill'],
                ['slug' => 'cuidado-personal', 'nombre' => 'Cuidado Personal', 'icon' => 'bi-heart-pulse-fill'],
                ['slug' => 'mascotas', 'nombre' => 'Mascotas', 'icon' => 'bi-bug-fill'],
                ['slug' => 'hogar', 'nombre' => 'Hogar', 'icon' => 'bi-house-door-fill'],
                ['slug' => 'panaderia', 'nombre' => 'Panadería', 'icon' => 'bi-bag-fill'],
                ['slug' => 'frutas-verduras', 'nombre' => 'Frutas y Verduras', 'icon' => 'bi-apple'],
                ['slug' => 'promociones', 'nombre' => 'Promociones', 'icon' => 'bi-percent'],
            ];
        @endphp

        @foreach ($categorias as $cat)
        <div class="col-6 col-md-4 col-lg-2 custom-col">
            <a href="{{ route('productos.categoria', [$cat['slug']]) }}" class="text-decoration-none">
                <div class="card shadow-sm text-center border-0 mb-3" style="border-radius: 1.5rem; min-height: 210px; display: flex; flex-direction: column; justify-content: center;">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center p-4">
                        <i class="bi {{ $cat['icon'] }} text-danger" style="font-size:3rem;"></i>
                        <span class="fw-semibold text-dark mt-3" style="font-size:1.1rem;">{{ $cat['nombre'] }}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
