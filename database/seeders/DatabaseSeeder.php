<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_CO');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // ─── 1. ROLES ───────────────────────────────────────────────
        $this->command->info('Insertando roles...');
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            ['name' => 'Administrador', 'description' => 'Acceso total al sistema',                    'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bodeguero',     'description' => 'Gestión de inventario y movimientos',        'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vendedor',      'description' => 'Gestión de clientes y salidas de productos', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ─── 2. PERMISSIONS ─────────────────────────────────────────
        $this->command->info('Insertando permisos...');
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert([
            ['name' => 'ver_dashboard',         'description' => 'Ver panel principal',                'created_at' => now(), 'updated_at' => now()],
            ['name' => 'gestionar_usuarios',     'description' => 'Crear y editar usuarios',            'created_at' => now(), 'updated_at' => now()],
            ['name' => 'gestionar_productos',    'description' => 'Crear y editar productos',           'created_at' => now(), 'updated_at' => now()],
            ['name' => 'gestionar_clientes',     'description' => 'Crear y editar clientes',            'created_at' => now(), 'updated_at' => now()],
            ['name' => 'gestionar_proveedores',  'description' => 'Crear y editar proveedores',         'created_at' => now(), 'updated_at' => now()],
            ['name' => 'gestionar_empleados',    'description' => 'Crear y editar empleados',           'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ver_reportes',           'description' => 'Ver e imprimir reportes',            'created_at' => now(), 'updated_at' => now()],
            ['name' => 'gestionar_materia_prima','description' => 'Entradas y salidas de materia prima','created_at' => now(), 'updated_at' => now()],
        ]);

        // ─── 3. ROLE_HAS_PERMISSIONS ────────────────────────────────
        DB::table('role_has_permissions')->truncate();
        $rolePerms = [];
        foreach (range(1, 8) as $p) $rolePerms[] = ['role_id' => 1, 'permission_id' => $p];
        foreach ([1, 3, 8]   as $p) $rolePerms[] = ['role_id' => 2, 'permission_id' => $p];
        foreach ([1, 4, 7]   as $p) $rolePerms[] = ['role_id' => 3, 'permission_id' => $p];
        DB::table('role_has_permissions')->insert($rolePerms);

        // ─── 4. USERS (137) ─────────────────────────────────────────
        $this->command->info('Insertando usuarios...');
        DB::table('users')->truncate();
        $hashedPwd = Hash::make('password123');
        DB::table('users')->insert([[
            'name' => 'Administrador Principal', 'email' => 'admin@fabricacardy.com',
            'role_id' => 1, 'password' => $hashedPwd,
            'email_verified_at' => now(), 'created_at' => now(), 'updated_at' => now(),
        ]]);
        $chunk = [];
        for ($i = 0; $i < 136; $i++) {
            $chunk[] = [
                'name'              => $faker->name(),
                'email'             => $faker->unique()->safeEmail(),
                'role_id'           => $faker->numberBetween(2, 3),
                'password'          => $hashedPwd,
                'email_verified_at' => now(),
                'created_at'        => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at'        => now(),
            ];
        }
        DB::table('users')->insert($chunk);
        $userIds   = DB::table('users')->pluck('id')->toArray();
        $userNames = DB::table('users')->pluck('name', 'id')->toArray();

        // ─── 5. EMPLEADOS (143) ─────────────────────────────────────
        $this->command->info('Insertando empleados...');
        DB::table('empleados')->truncate();
        $cargos   = ['Operario', 'Supervisor', 'Almacenista', 'Cortador', 'Costurero', 'Control de Calidad', 'Mensajero', 'Auxiliar'];
        $ciudades = ['Ibagué', 'Bogotá', 'Medellín', 'Cali', 'Armenia', 'Pereira', 'Manizales', 'Neiva', 'Bucaramanga', 'Barranquilla'];
        $chunk = [];
        for ($i = 0; $i < 143; $i++) {
            $chunk[] = [
                'nombre'     => $faker->name(),
                'documento'  => $faker->unique()->numerify('##########'),
                'telefono'   => '3' . $faker->numerify('#########'),
                'correo'     => $faker->unique()->safeEmail(),
                'ciudad'     => $faker->randomElement($ciudades),
                'direccion'  => 'Cra ' . rand(1,50) . ' #' . rand(1,99) . '-' . rand(1,99),
                'cargo'      => $faker->randomElement($cargos),
                'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
                'updated_at' => now(),
            ];
        }
        DB::table('empleados')->insert($chunk);
        $empleadoIds = DB::table('empleados')->pluck('id')->toArray();

        // ─── 6. MATERIA PRIMA (158) ─────────────────────────────────
        $this->command->info('Insertando materias primas...');
        DB::table('materia_primas')->truncate();
        $tiposMat = ['Cuero', 'Hilo', 'Plantilla', 'Suela', 'Accesorio', 'Tela', 'Espuma', 'Pegante'];
        $colores  = ['Negro', 'Café', 'Blanco', 'Rojo', 'Azul', 'Beige', 'Gris', 'Verde', 'Plateado', 'Dorado'];
        $chunk = [];
        for ($i = 0; $i < 158; $i++) {
            $tipo = $faker->randomElement($tiposMat);
            $chunk[] = [
                'nombre'      => $tipo . ' ' . $faker->word() . ' ' . ($i + 1),
                'tipo'        => $tipo,
                'color'       => $faker->randomElement($colores),
                'stock'       => $faker->numberBetween(50, 2000),
                'precio'      => $faker->randomFloat(2, 2000, 80000),
                'empleado_id' => $faker->randomElement($empleadoIds),
                'created_at'  => $faker->dateTimeBetween('-3 years', 'now'),
                'updated_at'  => now(),
            ];
        }
        DB::table('materia_primas')->insert($chunk);
        $materiaIds = DB::table('materia_primas')->pluck('id')->toArray();

        // ─── 7. PRODUCTOS (172) ─────────────────────────────────────
        $this->command->info('Insertando productos...');
        DB::table('productos')->truncate();
        $tiposProd = ['Zapato formal', 'Zapato casual', 'Sandalia', 'Bota', 'Mocasín', 'Deportivo', 'Calzado infantil', 'Alpargata', 'Pantufla', 'Zueco'];
        $generos   = ['hombre', 'mujer', 'niño', 'niña', 'unisex'];
        $chunk = [];
        for ($i = 0; $i < 172; $i++) {
            $chunk[] = [
                'nombre'           => $faker->randomElement($tiposProd) . ' ' . $faker->randomElement($generos) . ' talla ' . $faker->numberBetween(28, 45),
                'precio'           => $faker->randomFloat(2, 50000, 350000),
                'stock'            => $faker->numberBetween(10, 300),
                'materia_prima_id' => $faker->randomElement($materiaIds),
                'created_at'       => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at'       => now(),
            ];
        }
        DB::table('productos')->insert($chunk);
        $productoIds = DB::table('productos')->pluck('id')->toArray();

        // ─── 8. CLIENTES (129) ──────────────────────────────────────
        $this->command->info('Insertando clientes...');
        DB::table('clientes')->truncate();
        $chunk = [];
        for ($i = 0; $i < 129; $i++) {
            $chunk[] = [
                'nombre'     => $faker->company(),
                'documento'  => $faker->numerify('#########-#'),
                'telefono'   => '3' . $faker->numerify('#########'),
                'correo'     => $faker->unique()->companyEmail(),
                'ciudad'     => $faker->randomElement($ciudades),
                'direccion'  => 'Cl ' . rand(1,100) . ' #' . rand(1,99) . '-' . rand(1,99),
                'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
                'updated_at' => now(),
            ];
        }
        DB::table('clientes')->insert($chunk);
        $clienteIds = DB::table('clientes')->pluck('id')->toArray();

        // ─── 9. PROVEEDORES (147) ───────────────────────────────────
        $this->command->info('Insertando proveedores...');
        DB::table('proveedores')->truncate();
        $mercancias = ['Cuero natural', 'Cuero sintético', 'Hilos industriales', 'Suelas de caucho', 'Plantillas EVA', 'Hebillas metálicas', 'Pegantes', 'Telas textiles', 'Espumas', 'Accesorios'];
        $chunk = [];
        for ($i = 0; $i < 147; $i++) {
            $chunk[] = [
                'nombre'           => $faker->name(),
                'empresa'          => $faker->company(),
                'documento'        => $faker->unique()->numerify('##########'),
                'telefono'         => '3' . $faker->numerify('#########'),
                'fecha_nacimiento' => $faker->dateTimeBetween('-60 years', '-20 years')->format('Y-m-d'),
                'correo'           => $faker->unique()->safeEmail(),
                'ciudad'           => $faker->randomElement($ciudades),
                'direccion'        => 'Cra ' . rand(1,80) . ' #' . rand(1,99) . '-' . rand(1,99),
                'mercancia'        => $faker->randomElement($mercancias),
                'created_at'       => $faker->dateTimeBetween('-3 years', 'now'),
                'updated_at'       => now(),
            ];
        }
        DB::table('proveedores')->insert($chunk);

        // ─── 10. ENTRADAS MATERIA PRIMA (163) ───────────────────────
        $this->command->info('Insertando entradas de materia prima...');
        DB::table('entradas_materia_prima')->truncate();
        $obsEntradas = ['Pedido mensual', 'Reposición de stock', 'Compra urgente', 'Lote importado', 'Devolución proveedor', 'Compra adicional'];
        $chunk = [];
        for ($i = 0; $i < 163; $i++) {
            $uid = $faker->randomElement($userIds);
            $chunk[] = [
                'materia_prima_id' => $faker->randomElement($materiaIds),
                'cantidad'         => $faker->numberBetween(10, 500),
                'fecha'            => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
                'usuario_nombre'   => $userNames[$uid],
                'observacion'      => $faker->randomElement($obsEntradas),
                'user_id'          => $uid,
                'created_at'       => now(),
                'updated_at'       => now(),
            ];
        }
        DB::table('entradas_materia_prima')->insert($chunk);

        // ─── 11. SALIDAS MATERIA PRIMA (138) ────────────────────────
        $this->command->info('Insertando salidas de materia prima...');
        DB::table('salidas_materia_prima')->truncate();
        $obsSalMP = ['Producción lote zapatos', 'Costura botas', 'Fabricación sandalias', 'Uso en plantillas', 'Producción calzado infantil', 'Merma de producción'];
        $chunk = [];
        for ($i = 0; $i < 138; $i++) {
            $uid = $faker->randomElement($userIds);
            $chunk[] = [
                'materia_prima_id' => $faker->randomElement($materiaIds),
                'cantidad'         => $faker->numberBetween(5, 200),
                'fecha'            => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
                'usuario_nombre'   => $userNames[$uid],
                'observacion'      => $faker->randomElement($obsSalMP),
                'user_id'          => $uid,
                'created_at'       => now(),
                'updated_at'       => now(),
            ];
        }
        DB::table('salidas_materia_prima')->insert($chunk);

        // ─── 12. SALIDAS PRODUCTOS (154) ────────────────────────────
        $this->command->info('Insertando salidas de productos...');
        DB::table('salidas_productos')->truncate();
        $obsSalProd = ['Pedido cliente', 'Venta directa', 'Despacho mayorista', 'Exportación', 'Venta online', 'Pedido corporativo'];
        $chunk = [];
        for ($i = 0; $i < 154; $i++) {
            $uid = $faker->randomElement($userIds);
            $chunk[] = [
                'producto_id'    => $faker->randomElement($productoIds),
                'cliente_id'     => $faker->randomElement($clienteIds),
                'cantidad'       => $faker->numberBetween(1, 100),
                'fecha'          => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
                'usuario_nombre' => $userNames[$uid],
                'observacion'    => $faker->randomElement($obsSalProd),
                'user_id'        => $uid,
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }
        DB::table('salidas_productos')->insert($chunk);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('✅ ¡Listo! Base de datos poblada exitosamente.');
    }
}
