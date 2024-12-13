<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'ruc' => 12345678901,
            'nombre' => 'Distribuidora Alimentos S.A.',
            'dni' => '78901234',
            'email' => 'info@distribuidoraalimentos.com',
            'telefono' => '(+51) 456-7890',
            'direccion' => 'Av. Principal 123, Lima'
         ]);

         Proveedor::create([
            'ruc' => 3456789012,
            'nombre' => 'Frutas Frescas Ltda.',
            'dni' => '56789012',
            'email' => 'ventas@frutasfrescas.com',
            'telefono' => '(+51)  567-8901',
            'direccion' => 'Calle Secundaria 456, Lima'
         ]);

         Proveedor::create([
            'ruc' => 34567890123,
            'nombre' => 'Carnicería Don Juan',
            'dni' => '67890123',
            'email' => 'pedidos@carniceriadonjuan.com',
            'telefono' => '(+51) 678-9012',
            'direccion' => 'Plaza Mercado 789, Lima'
         ]);

         Proveedor::create([
            'ruc' => 45678901234,
            'nombre' => 'Pescados Marinos S.A.C.',
            'dni' => '90123456',
            'email' => 'ventas@pescadosmarinos.com',
            'telefono' => '(+51) 89-0123',
            'direccion' => 'Av. Principal 100, Lima'
         ]);

         Proveedor::create([
            'ruc' => 56789012345,
            'nombre' => 'Distribuidora de Lácteos Felices',
            'dni' => '2345678',
            'email' => 'info@lacteosfelices.com',
            'telefono' => '(+51) 890-1234',
            'direccion' => 'Carr. Lechera Km 202 Lima'
         ]);

         Proveedor::create([
            'ruc' => 67890123456,
            'nombre' => 'Proveeduría de Vegetales Orgánicos',
            'dni' => '23456789',
            'email' => 'ventas@vegetalesorganicos.com',
            'telefono' => '(+51) 901-2345',
            'direccion' => 'amino Ecológico 345, Lima'
         ]);

         Proveedor::create([
            'ruc' => 78901234567,
            'nombre' => 'Granos y Cereales Importados S.A.',
            'dni' => '4567890',
            'email' => 'pedidos@granosimportados.com',
            'telefono' => '(+51) 012-3456',
            'direccion' => 'Av. Internacional 567, Lima'
         ]);

         Proveedor::create([
            'ruc' => 89012345678,
            'nombre' => 'Vinos y Licores Finos E.I.R.L.',
            'dni' => '45678901',
            'email' => 'ventas@vinosylicores.com',
            'telefono' => '(+51) 23-4567',
            'direccion' => 'Calle Vinífera 678, Lima'
         ]);

         Proveedor::create([
            'ruc' => 90123456789,
            'nombre' => 'Dulces y Postres del Valle',
            'dni' => '56789012',
            'email' => 'info@dulcesdelvalle.com',
            'telefono' => '(+51) 456-7890',
            'direccion' => 'Valle de los Dulces 789,  Lima'
         ]);

    }
}
