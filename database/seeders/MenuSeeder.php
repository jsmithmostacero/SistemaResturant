<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'nombre' => 'Filete Mignon a la Parrilla',
            'categoria' => 'Plato Principal ',
            'imagen' => 'images/menus/filete.jpeg',
            'precio' => 25,
            'descripcion' => 'Jugoso filete mignon a la parrilla servido con jalapeños rellenos de queso crema y tocino.',
            'stockDiario' => 15,
            'id_categoria' => 1
         ]);

         Menu::create([
            'nombre' => 'Ensalada Mediterránea con Pollo a la Parrilla',
            'categoria' => 'Plato Principal ',       
            'imagen' => 'images/menus/pollo.jpg',
            'precio' => 18,
            'descripcion' => 'Ensalada fresca con mezcla de lechuga, tomate, pepino y pollo a la parrilla, aderezada con vinagreta balsámica.',
            'stockDiario' => 20,
            'id_categoria' => 2
         ]);

         Menu::create([
            'nombre' => 'Salmón Teriyaki con Arroz Basmati',
            'categoria' => 'Plato Principal ',       
            'imagen' => 'images/menus/salmon.jpg',
            'precio' => 19,
            'descripcion' => 'Filete de salmón glaseado con salsa teriyaki, acompañado de arroz basmati y tarta de chocolate.',
            'stockDiario' => 25,
            'id_categoria' => 6
         ]);

         
         Menu::create([
            'nombre' => 'Pad Thai de Vegetales y Tofu',
            'categoria' => 'Plato Principal ',       
            'imagen' => 'images/menus/pad thai.jpg',
            'precio' => 16,
            'descripcion' => 'Fideos de arroz salteados con vegetales frescos, tofu y una mezcla de sabores asiáticos; acompañado con mojito de frutas.',
            'stockDiario' => 18,
            'id_categoria' => 7
         ]);

         Menu::create([
            'nombre' => 'Filete de Cerdo con Salsa de Manzana',
            'categoria' => 'Plato Principal ',       
            'imagen' => 'images/menus/filetecerdo.jpg',
            'precio' => 23,
            'descripcion' => 'Filete de cerdo a la parrilla con una deliciosa salsa de manzana y guarnición de puré de patatas; acompañado del ceviche peruano.',
            'stockDiario' => 12,
            'id_categoria' => 4
         ]);
    }
}
