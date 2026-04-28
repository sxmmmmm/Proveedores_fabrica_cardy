<?php

namespace Database\Factories;

use App\Models\SalidaProducto;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalidaProductoFactory extends Factory
{
    protected $model = SalidaProducto::class;

    public function definition(): array
    {
        return [
            'producto_id'    => Producto::inRandomOrder()->value('id'),
            'cliente_id'     => Cliente::inRandomOrder()->value('id'),
            'cantidad'       => $this->faker->numberBetween(1, 30),
            'fecha'          => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'usuario_nombre' => $this->faker->name(),
            'observacion'    => $this->faker->optional(0.6)->sentence(),
            'user_id'        => User::inRandomOrder()->value('id'),
            'created_at'     => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
