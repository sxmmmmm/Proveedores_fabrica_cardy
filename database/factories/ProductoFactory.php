<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\MateriaPrima;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    private static array $nombres = [
        'Zapato Formal', 'Bota Casual', 'Sandalia Plana', 'Tenis Deportivo', 'Mocasín Clásico',
        'Botín Tacón', 'Zapato Oxford', 'Chancla Playa', 'Bota Trabajo', 'Zapatilla Running',
        'Zapato Escolar', 'Sandalia Tiras', 'Bota Vaquera', 'Tenis Urbano', 'Zapato Dama',
    ];

    public function definition(): array
    {
        return [
            'nombre'           => $this->faker->randomElement(self::$nombres) . ' ' . $this->faker->bothify('##?'),
            'precio'           => $this->faker->randomFloat(2, 50000, 350000),
            'stock'            => $this->faker->numberBetween(0, 200),
            'materia_prima_id' => null, // se asigna en el seeder
        ];
    }
}
