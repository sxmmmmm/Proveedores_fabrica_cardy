<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            ['description' => 'Administrador con acceso total']
        );

        $managerRole = Role::firstOrCreate(
            ['name' => 'manager'],
            ['description' => 'Gerente/Supervisor - Puede gestionar empleados y ver reportes']
        );

        $employeeRole = Role::firstOrCreate(
            ['name' => 'employee'],
            ['description' => 'Empleado Regular - Acceso limitado']
        );

        // Crear permisos
        $permissions = [
            // Empleados
            ['name' => 'view_employees', 'description' => 'Ver empleados'],
            ['name' => 'create_employees', 'description' => 'Crear empleados'],
            ['name' => 'edit_employees', 'description' => 'Editar empleados'],
            ['name' => 'delete_employees', 'description' => 'Eliminar empleados'],

            // Productos
            ['name' => 'view_products', 'description' => 'Ver productos'],
            ['name' => 'create_products', 'description' => 'Crear productos'],
            ['name' => 'edit_products', 'description' => 'Editar productos'],
            ['name' => 'delete_products', 'description' => 'Eliminar productos'],

            // Materias Primas
            ['name' => 'view_materials', 'description' => 'Ver materias primas'],
            ['name' => 'create_materials', 'description' => 'Crear materias primas'],
            ['name' => 'edit_materials', 'description' => 'Editar materias primas'],
            ['name' => 'delete_materials', 'description' => 'Eliminar materias primas'],

            // Proveedores
            ['name' => 'view_suppliers', 'description' => 'Ver proveedores'],
            ['name' => 'create_suppliers', 'description' => 'Crear proveedores'],
            ['name' => 'edit_suppliers', 'description' => 'Editar proveedores'],
            ['name' => 'delete_suppliers', 'description' => 'Eliminar proveedores'],

            // Clientes
            ['name' => 'view_clients', 'description' => 'Ver clientes'],
            ['name' => 'create_clients', 'description' => 'Crear clientes'],
            ['name' => 'edit_clients', 'description' => 'Editar clientes'],
            ['name' => 'delete_clients', 'description' => 'Eliminar clientes'],

            // Reportes
            ['name' => 'view_reports', 'description' => 'Ver reportes'],
            ['name' => 'export_pdf', 'description' => 'Exportar a PDF'],

            // Roles y usuarios
            ['name' => 'manage_roles', 'description' => 'Gestionar roles'],
            ['name' => 'manage_users', 'description' => 'Gestionar usuarios'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission['name']], $permission);
        }

        // Asignar permisos a Admin (todos)
        if ($adminRole->permissions()->count() === 0) {
            $adminPermissions = Permission::all();
            $adminRole->permissions()->attach($adminPermissions);
        }

        // Asignar permisos a Manager
        if ($managerRole->permissions()->count() === 0) {
            $managerPermissions = Permission::whereIn('name', [
                'view_employees',
                'edit_employees',
                'view_products',
                'view_materials',
                'view_suppliers',
                'view_clients',
                'view_reports',
                'export_pdf',
            ])->get();
            $managerRole->permissions()->attach($managerPermissions);
        }

        // Asignar permisos a Employee (solo lectura)
        if ($employeeRole->permissions()->count() === 0) {
            $employeePermissions = Permission::whereIn('name', [
                'view_employees',
                'view_products',
                'view_materials',
                'view_suppliers',
                'view_clients',
            ])->get();
            $employeeRole->permissions()->attach($employeePermissions);
        }
    }
}
