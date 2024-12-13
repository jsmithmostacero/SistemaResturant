<?php

namespace Database\Seeders;

use App\Models\Reservacion;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservacion::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'juan.perez@example.com',
            'numero' => '(+51) 123-456-7890',
            'fecha' => '2023-11-15 12:30:00',
            'cantidad' => 2,
            'id_mesa' => 2
         ]);

         Reservacion::create([
            'nombre' => 'María',
            'apellido' => 'Rodríguez',
            'correo' => 'maria.rodriguez@example.com',
            'numero' => '(+51) 234-567-8901',
            'fecha' => '2023-11-18 02:15:10',
            'cantidad' => 4,
            'id_mesa' => 5
         ]);

         
         Reservacion::create([
            'nombre' => 'Ana',
            'apellido' => 'Torres',
            'correo' => 'ana.torres@example.com',
            'numero' => '(+51) 456-789-0123',
            'fecha' => '2023-11-22 01:00:00',
            'cantidad' => 6,
            'id_mesa' => 6
         ]);

         Reservacion::create([
            'nombre' => 'Javier',
            'apellido' => 'López',
            'correo' => 'javier.lopez@example.com',
            'numero' => '(+51) 67-890-1234',
            'fecha' => '2023-11-25 03:05:17',
            'cantidad' => 4,
            'id_mesa' => 10
         ]);

         Reservacion::create([
            'nombre' => 'Sofía',
            'apellido' => 'Martínez',
            'correo' => 'sofia.martinez@example.com',
            'numero' => '(+51)  678-901-2345',
            'fecha' => '2023-11-28 12:00:00',
            'cantidad' => 2,
            'id_mesa' => 8
         ]);

         Reservacion::create([
            'nombre' => 'Alejandro',
            'apellido' => 'Vargas',
            'correo' => 'alejandro.vargas@example.com',
            'numero' => '(+51)  789-012-3456',
            'fecha' => '2023-12-01 11:45:00',
            'cantidad' => 2,
            'id_mesa' => 1
         ]);

         Reservacion::create([
            'nombre' => 'Valeria',
            'apellido' => 'Silva',
            'correo' => 'valeria.silva@example.com',
            'numero' => '(+51)  890-123-4567',
            'fecha' => '2023-12-05 01:40:00',
            'cantidad' => 2,
            'id_mesa' => 3
         ]);

         Reservacion::create([
            'nombre' => 'Diego',
            'apellido' => 'Ramírez',
            'correo' => 'diego.ramirez@example.com',
            'numero' => '(+51)  01-234-5678',
            'fecha' => '2023-12-08 03:50:00',
            'cantidad' => 4,
            'id_mesa' => 4
         ]);

         Reservacion::create([
            'nombre' => 'Laura',
            'apellido' => 'Herrera',
            'correo' => 'laura.herrera@example.com',
            'numero' => '(+51)  012-345-6789',
            'fecha' => '2023-12-10 01:00:24',
            'cantidad' => 2,
            'id_mesa' => 7
         ]);
    }
}
