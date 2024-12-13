<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRole;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'AdministradorSistema']);
        $role2 = Role::create(['name' => 'Administrador']);
        $role3 = Role::create(['name' => 'Recepcionista']);
        $role4 = Role::create(['name' => 'Mesero']);
        $role5 = Role::create(['name' => 'JefeCompras']);
        $role6 = Role::create(['name' => 'JefeAlmacen']);


         Permission::create(['name' =>  'users.index', 'description' => 'Listado de usuarios'])->syncRoles([$role1]);
         Permission::create(['name' =>  'users.create', 'description' => 'Crear usuarios'])->syncRoles([$role1]);
         Permission::create(['name' => 'users.edit', 'description' => 'Editar usuarios'])->syncRoles([$role1]);
         Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuarios'])->syncRoles([$role1]);

         Permission::create(['name' => 'NewPassword', 'description' => 'Editar perfil'])->syncRoles([$role1]);
         Permission::create(['name' => 'estadisticas', 'description' => 'Ver gráfico de estadísticas'])->syncRoles([$role1, $role2]);


         Permission::create(['name' =>  'roles.index', 'description' => 'Listado de roles'])->syncRoles([$role1]);
         Permission::create(['name' => 'roles.create', 'description' => 'Crear roles'])->syncRoles([$role1]);
         Permission::create(['name' => 'roles.edit', 'description' => 'Editar roles'])->syncRoles([$role1]);
         Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$role1]);

         Permission::create(['name' =>  'categorias.index', 'description' => 'Listado de categorías'])->syncRoles([$role1, $role2]);
         Permission::create(['name' => 'categorias.create', 'description' => 'Crear categorías'])->syncRoles([$role1, $role2]);
         Permission::create(['name' =>  'categorias.edit', 'description' => 'Editar categorías'])->syncRoles([$role1, $role2]);
         Permission::create(['name' =>  'categorias.destroy', 'description' => 'Eliminar categorías'])->syncRoles([$role1, $role2]);
         Permission::create(['name' =>  'categorias.show', 'description' => 'Ver detalles de categorías'])->syncRoles([$role1, $role2]);


        Permission::create(['name' =>   'reservaciones.index', 'description' => 'Listado de reservaciones'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'reservaciones.create', 'description' => 'Crear reservaciones'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'reservaciones.edit', 'description' => 'Editar reservaciones'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'reservaciones.destroy', 'description' => 'Eliminar reservaciones'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'reservaciones.show', 'description' => 'Ver detalles de reservaciones'])->syncRoles([$role1, $role3]);

        Permission::create(['name' =>  'mesas.index', 'description' => 'Listado de mesas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'mesas.create', 'description' => 'Crear mesas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'mesas.edit', 'description' => 'Editar reservaciones'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'mesas.destroy', 'description' => 'Eliminar reservaciones'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'mesas.show', 'description' => 'Ver detalles de mesas'])->syncRoles([$role1, $role3]);

        Permission::create(['name' =>  'menus.index', 'description' => 'Listado de menus'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'menus.create', 'description' => 'Crear menus'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'menus.edit', 'description' => 'Editar menus'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'menus.destroy', 'description' => 'Eliminar menus'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'menus.show', 'description' => 'Ver detalles del menu'])->syncRoles([$role1, $role2]);

        Permission::create(['name' =>  'proveedores.index', 'description' => 'Listado de proveedores'])->syncRoles([$role1, $role5, $role2]);
        Permission::create(['name' =>  'proveedores.create', 'description' => 'Crear proveedores'])->syncRoles([$role1, $role5, $role2]);
        Permission::create(['name' =>  'proveedores.edit', 'description' => 'Editar proveedores'])->syncRoles([$role1, $role5, $role2]);
        Permission::create(['name' =>  'proveedores.destroy', 'description' => 'Eliminar proveedores'])->syncRoles([$role1, $role5, $role2]);

        Permission::create(['name' =>  'productos.index', 'description' => 'Listado de productos'])->syncRoles([$role1, $role6,  $role5]);
        Permission::create(['name' =>  'productos.create', 'description' => 'Crear productos'])->syncRoles([$role1, $role6,  $role5]);
        Permission::create(['name' =>  'productos.edit', 'description' => 'Editar productos'])->syncRoles([$role1, $role6, $role5]);
        Permission::create(['name' =>  'productos.destroy', 'description' => 'Eliminar productos'])->syncRoles([$role1, $role6,  $role5]);

        Permission::create(['name' =>  'pedido.index', 'description' => 'Listado de pedidos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'pedido.create', 'description' => 'Crear pedidos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'pedido.edit', 'description' => 'Editar pedidos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'pedido.destroy', 'description' => 'Eliminar pedidos'])->syncRoles([$role1, $role2]);


        Permission::create(['name' =>  'ingredientes.index', 'description' => 'Listado de ingredientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'ingredientes.create', 'description' => 'Crear ingrediente'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'ingredientes.edit', 'description' => 'Editar ingredientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'ingredientes.destroy', 'description' => 'Eliminar ingredientes'])->syncRoles([$role1, $role2]);

        Permission::create(['name' =>   'consultas.index', 'description' => 'Listado de consultas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'consultas.create', 'description' => 'Crear consultas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'consultas.edit', 'description' => 'Editar consultas'])->syncRoles([$role1, $role3]);
        Permission::create(['name' =>  'consultas.destroy', 'description' => 'Eliminar consultas'])->syncRoles([$role1, $role3]);

        Permission::create(['name' =>   'ventas.index', 'description' => 'Listado de ventas'])->syncRoles([$role1, $role4]);
        Permission::create(['name' =>  'ventas.pdf', 'description' => 'Generar comprobante de pago'])->syncRoles([$role1, $role4]);

        Permission::create(['name' =>  'compras.index', 'description' => 'Listado de orden de compras'])->syncRoles([$role1, $role5]);
        Permission::create(['name' =>  'compras.create', 'description' => 'Crear ordenes de compras'])->syncRoles([$role1, $role5]);
        Permission::create(['name' =>  'compras.destroy', 'description' => 'Anular orden de compra'])->syncRoles([$role1, $role2]);
        Permission::create(['name' =>  'compras.show', 'description' => 'Generar comprobante de pago'])->syncRoles([$role1, $role2, $role5]);


    }
}
