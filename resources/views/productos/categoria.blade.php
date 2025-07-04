@extends('layouts.app')

@section('content')
<style>
    @media (min-width: 1200px) {
        .col-lg-5th {
            flex: 0 0 20%;
            max-width: 20%;
        }
    }
</style>

<div class="container mt-5 mb-5">
    <h2 class="text-2xl font-bold text-center mb-5">{{ $nombre_categoria }}</h2>
    <div class="row justify-content-center g-4">
        @foreach($items as $p)
        <div class="col-12 col-sm-6 col-md-4 col-lg-5th d-flex align-items-stretch">
            <div class="card shadow-sm text-center border-0 mb-3 w-100" style="border-radius: 1.5rem;">
                <div class="card-body d-flex flex-column align-items-center justify-content-center p-4">
                    <img src="/images/{{ $p['img'] }}" alt="{{ $p['nombre'] }}" style="max-width:80px; max-height:80px;">
                    <span class="fw-bold mt-3">{{ $p['nombre'] }}</span>
                    <span class="text-muted mb-2">S/. {{ number_format($p['precio'],2) }}</span>
                    <div id="buy-section-{{ $p['id'] }}">
                        <button class="btn btn-danger w-100" onclick="agregarCarrito({{ $p['id'] }},'{{ $p['nombre'] }}',{{ $p['precio'] }})">Comprar</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')

<script>
function agregarCarrito(id, nombre, precio) {
    // Para depurar:
    console.log("Agregando al carrito:", {id, nombre, precio});

    fetch("{{ route('carrito.agregar') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id, nombre, precio })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // Pintamos controles de cantidad PASANDO siempre nombre y precio
            document.getElementById('buy-section-'+id).innerHTML = `
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <button class="btn btn-light btn-sm"
                        onclick="cambiarCantidad(${id}, -1, '${nombre}', ${precio})">-</button>
                    <span id="qty-${id}">1</span>
                    <button class="btn btn-light btn-sm"
                        onclick="cambiarCantidad(${id},  1, '${nombre}', ${precio})">+</button>
                </div>
            `;
        } else {
            console.error("Error al agregar:", data);
        }
    })
    .catch(err => console.error(err));
}

function cambiarCantidad(id, change, nombre, precio) {
    let qtySpan = document.getElementById('qty-'+id);
    let qty = parseInt(qtySpan.textContent) + change;
    if (qty < 0) qty = 0;

    fetch("{{ route('carrito.actualizar') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id, cantidad: qty })
    })
    .then(res => res.json())
    .then(data => {
        if (qty <= 0) {
            // Volvemos a pintar el botón Comprar con TODOS los parámetros
            document.getElementById('buy-section-'+id).innerHTML = 
                `<button class="btn btn-danger w-100"
                    onclick="agregarCarrito(${id}, '${nombre}', ${precio})">
                    Comprar
                </button>`;
        } else {
            qtySpan.textContent = qty;
        }
    })
    .catch(err => console.error(err));
}
</script>
@endsection
