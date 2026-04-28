<?php

namespace Database\Factories;

use App\Models\EntradaMateriaPrima;
use App\Models\MateriaPrima;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntradaMateriaPrimaFactory extends Factory
{
    protected $model = EntradaMateriaPrima::class;

    public function definition(): array
    {
        return [
            'materia_prima_id' => MateriaPrima::inRandomOrder()->value('id'),
            'cantidad'         => $this->faker->numberBetween(5, 200),
            'fecha'            => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'usuario_nombre'   => $this->faker->name(),
            'observacion'      => $this->faker->optional(0.6)->sentence(),
            'user_id'          => User::inRandomOrder()->value('id'),
            'created_at'       => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
