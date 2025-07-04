<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index() {
        $categorias = [
            ['slug' => 'bebidas', 'nombre' => 'Bebidas'],
            ['slug' => 'abarrotes', 'nombre' => 'Abarrotes'],
            ['slug' => 'snacks', 'nombre' => 'Snacks'],
            ['slug' => 'limpieza', 'nombre' => 'Limpieza'],
            ['slug' => 'cuidado-personal', 'nombre' => 'Cuidado Personal'],
            ['slug' => 'mascotas', 'nombre' => 'Mascotas'],
            ['slug' => 'hogar', 'nombre' => 'Hogar'],
            ['slug' => 'panaderia', 'nombre' => 'Panadería'],
            // puedes agregar más
        ];
        return view('productos.index', compact('categorias'));
    }

    public function categoria($categoria)
    {
        $productos = [
            'bebidas' => [
                ['id'=>1,'nombre'=>'Coca Cola','precio'=>7.80,'img'=>'coca.png'],
                ['id'=>2,'nombre'=>'Inca Kola','precio'=>4.80,'img'=>'inca.png'],
                ['id'=>3,'nombre'=>'Frugos Mango','precio'=>5.20,'img'=>'frugos.png'],
                ['id'=>4,'nombre'=>'Agua San Luis','precio'=>1.20,'img'=>'agua.png'],
                ['id'=>5,'nombre'=>'Sprite','precio'=>6.00,'img'=>'sprite.png'],
                ['id'=>6,'nombre'=>'Pepsi','precio'=>6.30,'img'=>'pepsi.png'],
                ['id'=>7,'nombre'=>'Guaraná','precio'=>6.50,'img'=>'guarana.png'],
                ['id'=>8,'nombre'=>'Leche Gloria','precio'=>4.90,'img'=>'gloria.png'],
                ['id'=>9,'nombre'=>'Fanta','precio'=>6.00,'img'=>'fanta.png'],
                ['id'=>10,'nombre'=>'Kola Inglesa','precio'=>6.20,'img'=>'inglesa.png'],
            ],
            // ...igual para las otras categorías
            'abarrotes' => [
                ['id'=>11,'nombre'=>'Arroz','precio'=>2.50,'img'=>'arroz.png'],
                ['id'=>12,'nombre'=>'Azúcar','precio'=>1.80,'img'=>'azucar.png'],
                ['id'=>13,'nombre'=>'Sal','precio'=>0.50,'img'=>'sal.png'],
                ['id'=>14,'nombre'=>'Harina','precio'=>1.20,'img'=>'harina.png'],
                ['id'=>15,'nombre'=>'Lentejas','precio'=>2.00,'img'=>'lentejas.png'],
                ['id'=>16,'nombre'=>'Fideos','precio'=>1.50,'img'=>'fideos.png'],
                ['id'=>17,'nombre'=>'Salsa de Tomate','precio'=>2.20,'img'=>'salsa_tomate.png'],
                ['id'=>18,'nombre'=>'Aceite','precio'=>3.00,'img'=>'aceite.png'],
                ['id'=>19,'nombre'=>'Vinagre','precio'=>1.00,'img'=>'vinagre.png'],
                ['id'=>20,'nombre'=>'Sopa Instantánea','precio'=>0.80,'img'=>'sopa_instantanea.png'],
            ],
        ];
        $items = $productos[$categoria] ?? [];
        $nombre_categoria = ucfirst(str_replace('-', ' ', $categoria));
        return view('productos.categoria', compact('items','nombre_categoria','categoria'));
    }

}
