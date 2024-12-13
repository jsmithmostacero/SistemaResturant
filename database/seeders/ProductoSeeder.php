<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'fecha_caducidad' => '2025-02-28',
            'categoria' => 'Bebidas refrezcantes',
            'estado' => 'Disponible',
            'nombre' => 'Inca Kola 3L',
            'precio' => 15,
            'stock' => 50,
            'imagen' => 'images/productos/inca.webp'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-02-28',
            'categoria' => 'Bebidas refrezcantes',
            'estado' => 'Disponible',
            'nombre' => 'Coca Cola 3L',
            'precio' => 15,
            'stock' => 50,
            'imagen' => 'images/productos/coca.png'
         ]);

        Producto::create([
            'fecha_caducidad' => '2025-02-28',
            'categoria' => 'Carnes',
            'estado' => 'Disponible',
            'nombre' => 'Pechugas de Pollo',
            'precio' => 13,
            'stock' => 30,
            'imagen' => 'images/productos/pechuga.png'
         ]);

         Producto::create([
            'fecha_caducidad' => ' 2025-11-15',
            'categoria' => 'Frutas',
            'estado' => 'Disponible',
            'nombre' => 'Manzanas',
            'precio' => 2,
            'stock' => 50,
            'imagen' => 'images/productos/manzana.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-12-10',
            'categoria' => 'Harinas y Panificación',
            'estado' => 'Disponible',
            'nombre' => 'Harina de Trigo',
            'precio' => 1,
            'stock' => 20,
            'imagen' => 'images/productos/harina.png'

         ]);

         Producto::create([
            'fecha_caducidad' => '2025-11-30',
            'categoria' => ' Lácteos',
            'estado' => 'Disponible',
            'nombre' => 'Leche Entera',
            'precio' => 6.50,
            'stock' => 20,
            'imagen' => 'images/productos/leche.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-12-20',
            'categoria' => 'Salsas y Condimentos',
            'estado' => 'Disponible',
            'nombre' => 'Salsa de Tomate',
            'precio' => 2,
            'stock' => 0.50,
            'imagen' => 'images/productos/tomate.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-01-05',
            'categoria' => 'Legumbres',
            'estado' => 'Disponible',
            'nombre' => 'Lentejas',
            'precio' => 9,
            'stock' => 25,
            'imagen' => 'images/productos/lentejas.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-11-15',
            'categoria' => 'Granos y Cereales',
            'estado' => 'Disponible',
            'nombre' => 'Arroz Basmati',
            'precio' => 1,
            'stock' => 50,
            'imagen' => 'images/productos/arroz.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-12-31',
            'categoria' => 'Condimentos',
            'estado' => 'Disponible',
            'nombre' => 'Aceite de Oliva Extra Virgen',
            'precio' => 1,
            'stock' => 40,
            'imagen' => 'images/productos/aceite.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-11-25',
            'categoria' => 'Quesos',
            'estado' => 'Disponible',
            'nombre' => 'Queso Cheddar',
            'precio' => 7.50,
            'stock' => 10,
            'imagen' => 'images/productos/queso.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-12-15',
            'categoria' => 'Snacks',
            'estado' => 'Disponible',
            'nombre' => 'Galletas de Avena',
            'precio' => 3.50,
            'stock' => 30,
            'imagen' => 'images/productos/galleta.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-03-10',
            'categoria' => 'Bebidas',
            'estado' => 'Disponible',
            'nombre' => 'Café en Grano',
            'precio' => 2,
            'stock' => 22,
            'imagen' => 'images/productos/cafe.png'
         ]);

         Producto::create([
            'fecha_caducidad' => '2025-12-12',
            'categoria' => 'Sal de mesa',
            'estado' => 'No Disponible',
            'nombre' => 'Sal',
            'precio' => 6,
            'stock' => 1,
            'imagen' => 'images/productos/sal.png'
         ]);


    }
}
