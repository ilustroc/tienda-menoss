<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // Agregar producto al carrito
    public function agregar(Request $request) {
        $id = $request->input('id');
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        $cantidad = 1;

        $carrito = session()->get('carrito', []);
        if(isset($carrito[$id])){
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'id' => $id,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad,
            ];
        }
        session(['carrito' => $carrito]);
        return response()->json(['success' => true, 'carrito' => $carrito]);
    }

    // Actualizar cantidad en el carrito
    public function actualizar(Request $request) {
        $id = $request->input('id');
        $cantidad = $request->input('cantidad');

        $carrito = session()->get('carrito', []);
        if(isset($carrito[$id])){
            $carrito[$id]['cantidad'] = $cantidad;
            if($cantidad <= 0) unset($carrito[$id]);
        }
        session(['carrito' => $carrito]);
        return response()->json(['success' => true, 'carrito' => $carrito]);
    }

    public function ver() {
        $carrito_sesion = session('carrito', []);

        $productos = [
            1 => ['nombre'=>'Coca Cola','precio'=>7.80],
            2 => ['nombre'=>'Inca Kola','precio'=>4.80],
            3 => ['nombre'=>'Frugos Mango','precio'=>5.20],
            4 => ['nombre'=>'Agua San Luis','precio'=>1.20],
            5 => ['nombre'=>'Sprite','precio'=>6.00],
            6 => ['nombre'=>'Pepsi','precio'=>6.30],
            7 => ['nombre'=>'Guaraná','precio'=>6.50],
            8 => ['nombre'=>'Leche Gloria','precio'=>4.90],
            9 => ['nombre'=>'Fanta','precio'=>6.00],
            10 => ['nombre'=>'Kola Inglesa','precio'=>6.20],
            11 => ['nombre'=>'Arroz','precio'=>2.50],
            12 => ['nombre'=>'Azúcar','precio'=>1.80],
            // completa con todos los productos que tengas
        ];

        $carrito = [];

        foreach($carrito_sesion as $id => $data) {
            if(isset($productos[$id])) {
                $carrito[] = [
                    'nombre' => $productos[$id]['nombre'],
                    'precio' => $productos[$id]['precio'],
                    'cantidad' => $data['cantidad'],
                ];
            }
        }

        return view('carrito.index', compact('carrito'));
    }

}
