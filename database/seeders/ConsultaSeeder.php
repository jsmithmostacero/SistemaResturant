<?php

namespace Database\Seeders;

use App\Models\Consulta;
use Illuminate\Database\Seeder;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consulta::create([
            'estatus' => 'Sin responder',
            'id_reservacions' => 6
         ]);

         Consulta::create([
            'estatus' => 'Sin responder',
            'id_reservacions' => 2
         ]);

         Consulta::create([
            'estatus' => 'Sin responder',
            'id_reservacions' => 1
         ]);

         Consulta::create([
            'estatus' => 'Sin responder',
            'id_reservacions' => 4
         ]);

         Consulta::create([
            'estatus' => 'Respondida',
            'id_reservacions' => 3
         ]);

         Consulta::create([
            'estatus' => 'Respondida',
            'id_reservacions' => 9
         ]);

         Consulta::create([
            'estatus' => 'Respondida',
            'id_reservacions' => 5
         ]);
       
    }
}
