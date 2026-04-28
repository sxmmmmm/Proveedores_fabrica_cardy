<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    private static array $ciudades = [
        'Bogotá', 'Medellín', 'Cali', 'Barranquilla', 'Cartagena',
        'Bucaramanga', 'Pereira', 'Manizales', 'Santa Marta', 'Cúcuta',
    ];

    public function definition(): array
    {
        return [
            'nombre'    => $this->faker->name(),
            'documento' => $this->faker->unique()->numerify('##########'),
            'telefono'  => $this->faker->numerify('3##-###-####'),
            'correo'    => $this->faker->unique()->safeEmail(),
            'ciudad'    => $this->faker->randomElement(self::$ciudades),
            'direccion' => $this->faker->streetAddress(),
        ];
    }
}
