<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\MesaSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\ReservaSeeder;
use Database\Seeders\ConsultaSeeder;
use Database\Seeders\ProductoSeeder;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\ProveedorSeeder;
use Spatie\Permission\Traits\HasRoles;
use Database\Seeders\IngredienteSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(MesaSeeder::class);
        $this->call(IngredienteSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(ReservaSeeder::class);
        $this->call(ConsultaSeeder::class);


        \App\Models\User::factory()->create([
            'name' => 'Juan Gutierrez',
            'email' => 'adminsistema@gmail.com',
            'password' => bcrypt('admin'),
         ])->assignRole('AdministradorSistema');

         \App\Models\User::factory()->create([
           'name' => 'Cristian Vásquez',
           'email' => 'administrador@gmail.com',
           'password' => bcrypt('administrador'),
           ])->assignRole('Administrador');

        \App\Models\User::factory()->create([
           'name' => 'Tatiana Guerrero',
           'email' => 'recepcionista@gmail.com',
           'password' => bcrypt('recepcionista'),
           ])->assignRole('Recepcionista');

        \App\Models\User::factory()->create([
           'name' => 'Julián Pérez',
           'email' => 'mesero@gmail.com',
           'password' => bcrypt('mesero'),
           ])->assignRole('Mesero');

        \App\Models\User::factory()->create([
         'name' => 'Carlos Martínez',
         'email' => 'jefecompras@gmail.com',
         'password' => bcrypt('jefecompras'),
         ])->assignRole('JefeCompras');

      \App\Models\User::factory()->create([
         'name' => 'Iván Gómez',
         'email' => 'jefealmacen@gmail.com',
         'password' => bcrypt('jefealmacen'),
         ])->assignRole('JefeAlmacen');

    }
}
