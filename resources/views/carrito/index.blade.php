@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Carrito de Compras</h2>
    @if(count($carrito) == 0)
        <p>No hay productos en el carrito.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($carrito as $item)
                    @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item['nombre'] }}</td>
                        <td>S/. {{ number_format($item['precio'],2) }}</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>S/. {{ number_format($subtotal,2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total</td>
                    <td class="fw-bold">S/. {{ number_format($total,2) }}</td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
@endsection
