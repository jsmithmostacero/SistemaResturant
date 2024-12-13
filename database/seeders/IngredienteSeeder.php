<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use Illuminate\Database\Seeder;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingrediente::create([
            'nombre' => 'Tomate',
            'descripcion' => 'Tomates rojos y maduros, cultivados localmente.',
            'medida' => 'Unidad',
            'cantidad' => 100,
            'precio' => 1,
            'imagen' => 'images/ingredientes/tomate.png'
         ]);

         Ingrediente::create([
            'nombre' => 'Pollo entero',
            'descripcion' => 'Pechuga de pollo sin hueso y sin piel.',
            'medida' => 'Kg',
            'cantidad' => 10,
            'precio' => 9,
            'imagen' => 'images/ingredientes/pollo.png'
         ]);

         Ingrediente::create([
            'nombre' => 'Lechuga',
            'descripcion' => 'Hojas frescas de lechuga.',
            'medida' => 'Manojo',
            'cantidad' => 20,
            'precio' => 0.50,
            'imagen' => 'images/ingredientes/lechuga.png'
         ]);

         Ingrediente::create([
            'nombre' => 'Queso cheddar rallado',
            'descripcion' => 'Queso cheddar en forma rallada.',
            'medida' => '500 Gramos',
            'cantidad' => 100,
            'precio' => 6,
            'imagen' => 'images/ingredientes/queso.png'
         ]);


         Ingrediente::create([
            'nombre' => 'Salsa de tomate',
            'descripcion' => 'Salsa de tomate casera.',
            'medida' => 'Litro',
            'cantidad' => 10,
            'precio' => 4,
            'imagen' => 'images/ingredientes/salsa.png'
         ]);

         Ingrediente::create([
            'nombre' => 'Filete de salmón',
            'descripcion' => 'Filete fresco de salmón de origen sostenible.',
            'medida' => 'Kg',
            'cantidad' => 8,
            'precio' => 62,
            'imagen' => 'images/ingredientes/filete.png'
         ]);

         Ingrediente::create([
            'nombre' => 'Cebolla roja',
            'descripcion' => 'Cebollas rojas frescas y picantes.',
            'medida' => 'Unidad',
            'cantidad' => 40,
            'precio' => 0.50,
            'imagen' => 'images/ingredientes/cebolla.png'
         ]);

         Ingrediente::create([
            'nombre' => 'Champiñones frescos',
            'descripcion' => 'Champiñones blancos frescos.',
            'medida' => '300 Gramos',
            'cantidad' => 7,
            'precio' => 0.30,
            'imagen' => 'images/ingredientes/champiñones.png'
         ]);

         Ingrediente::create([
            'nombre' => 'Pimientos rojos',
            'descripcion' => 'Pimientos rojos frescos y crujientes.',
            'medida' => 'Unidad',
            'cantidad' => 25,
            'precio' => 1,
            'imagen' => 'images/ingredientes/pimientos.png'
         ]);

         Ingrediente::create([
            'nombre' => 'Aceitunas negras',
            'descripcion' => 'Aceitunas negras sin hueso y en salmuera.',
            'medida' => '250 Gramos',
            'cantidad' => 30,
            'precio' => 0.60,
            'imagen' => 'images/ingredientes/aceitunas.png'
         ]);

    }
}
