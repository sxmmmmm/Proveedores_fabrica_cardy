<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\MateriaPrima;
use App\Models\Producto;

class DatosEjemploSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Empleados (60 registros)
        $this->command->info('Creando empleados...');
        Empleado::factory(60)->create();

        // 2. Clientes (60 registros)
        $this->command->info('Creando clientes...');
        Cliente::factory(60)->create();

        // 3. Proveedores (60 registros)
        $this->command->info('Creando proveedores...');
        Proveedor::factory(60)->create();

        // 4. Materias Primas (60 registros, asignando empleados existentes)
        $this->command->info('Creando materias primas...');
        $empleadoIds = Empleado::pluck('id')->toArray();
        MateriaPrima::factory(60)->create([
            'empleado_id' => fn() => $empleadoIds[array_rand($empleadoIds)],
        ]);

        // 5. Productos (60 registros, asignando materias primas existentes)
        $this->command->info('Creando productos...');
        $materiaIds = MateriaPrima::pluck('id')->toArray();
        Producto::factory(60)->create([
            'materia_prima_id' => fn() => $materiaIds[array_rand($materiaIds)],
        ]);

        $this->command->info('✅ Datos de ejemplo creados: 60 registros por módulo.');
    }
}
