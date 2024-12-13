<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Entradas Calientes',
            'imagen' => 'images/categorias/jalapeños.jpg',
            'nombrec' => 'Jalapeños Rellenos',
            'descripcion' => 'Jalapeños frescos rellenos de queso crema y envueltos en tocino.'
         ]);

         Categoria::create([
            'nombre' => ' Ensaladas Frescas',
            'imagen' => 'images/categorias/ensalada.png',
            'nombrec' => 'Ensalada de la Casa',
            'descripcion' => 'Mezcla fresca de lechuga, tomate, pepino, y aderezo de vinagreta balsámica.'
         ]);

         Categoria::create([
            'nombre' => ' Aperitivos para Compartir',
            'imagen' => 'images/categorias/tabla.png',
            'nombrec' => 'Tabla de Quesos',
            'descripcion' => 'Una exquisita selección de quesos artesanales que incluye variedades como queso brie, queso azul, queso cheddar y acompañado de frutas secas, nueces y mermeladas. '
         ]);

         Categoria::create([
            'nombre' => ' Entradas Frías',
            'imagen' => 'images/categorias/ceviche.png',
            'nombrec' => 'Ceviche',
            'descripcion' => ' Un plato perfecto para los amantes de los sabores frescos y marinos.'
         ]);

         Categoria::create([
            'nombre' => 'Postres Tentadores',
            'imagen' => 'images/categorias/tiramisu.png',
            'nombrec' => 'Tiramisú Casero',
            'descripcion' => 'Delicioso tiramisú casero con capas de bizcocho, café y crema de mascarpone.'
         ]);

         Categoria::create([
            'nombre' => ' Postres Tentadores',
            'imagen' => 'images/categorias/torta.png',
            'nombrec' => 'Tarta de Chocolate',
            'descripcion' => 'Deliciosa tarta de chocolate con ganache y fresas frescas.'
         ]);

         Categoria::create([
            'nombre' => 'Bebidas Refrescantes',
            'imagen' => 'images/categorias/mojito.png',
            'nombrec' => 'Mojito de Frutas',
            'descripcion' => 'Mojito con menta fresca y mezcla de frutas de temporada.'
         ]);
    }
}
