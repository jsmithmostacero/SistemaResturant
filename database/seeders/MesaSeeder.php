<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mesa;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mesa::create([
           'nombre' => 'Mesa 1',
           'cantidad' => 2,
           'estado' => 'Disponible',
           'locacion' => 'Entrada'
        ]);

        Mesa::create([
            'nombre' => 'Mesa 2',
            'cantidad' => 2,
            'estado' => 'Disponible',
            'locacion' => 'Salón'
         ]);

         Mesa::create([
            'nombre' => 'Mesa 3',
            'cantidad' => '2',
            'estado' => 'Disponible',
            'locacion' => 'Frentecocina'
         ]);
         Mesa::create([
            'nombre' => 'Mesa 4',
            'cantidad' => 4,
            'estado' => 'Disponible',
            'locacion' => 'Salón'
         ]);
         Mesa::create([
            'nombre' => 'Mesa 5',
            'cantidad' => 4,
            'estado' => 'Disponible',
            'locacion' => 'Salón'
         ]);
         Mesa::create([
            'nombre' => 'Mesa 6',
            'cantidad' => 6,
            'estado' => 'Disponible',
            'locacion' => 'Salón'
         ]);
         Mesa::create([
            'nombre' => 'Mesa 7',
            'cantidad' => 2,
            'estado' => 'Disponible',
            'locacion' => 'Entrada'
         ]);
         Mesa::create([
            'nombre' => 'Mesa 8',
            'cantidad' => 2,
            'estado' => 'Disponible',
            'locacion' => 'Salón'
         ]);
         Mesa::create([
            'nombre' => 'Mesa 9',
            'cantidad' => 4,
            'estado' => 'Disponible',
            'locacion' => 'Frentecocina'
         ]);
         Mesa::create([
            'nombre' => 'Mesa 10',
            'cantidad' => 4,
            'estado' => 'Disponible',
            'locacion' => 'Frentecocina'
         ]);
    }
}
