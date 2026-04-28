<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EntradaMateriaPrima;
use App\Models\SalidaMateriaPrima;
use App\Models\SalidaProducto;
use App\Models\User;
use App\Models\MateriaPrima;
use App\Models\Producto;
use App\Models\Cliente;

class MovimientosSeeder extends Seeder
{
    public function run(): void
    {
        // Verificar que existan datos base
        if (User::count() === 0 || MateriaPrima::count() === 0 || Producto::count() === 0 || Cliente::count() === 0) {
            $this->command->warn('⚠ Faltan datos base. Ejecuta primero DatosEjemploSeeder.');
            return;
        }

        $this->command->info('Creando entradas de materia prima...');
        EntradaMateriaPrima::factory(80)->create();

        $this->command->info('Creando salidas de materia prima...');
        SalidaMateriaPrima::factory(80)->create();

        $this->command->info('Creando salidas de productos...');
        SalidaProducto::factory(80)->create();

        $this->command->info('✅ Movimientos creados: 80 registros por módulo.');
    }
}
