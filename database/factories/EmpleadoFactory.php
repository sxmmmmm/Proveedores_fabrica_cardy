<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;

    private static array $cargos = [
        'Cortador', 'Costurero', 'Armador', 'Terminador', 'Bodeguero',
        'Supervisor', 'Diseñador', 'Control de Calidad', 'Operario', 'Auxiliar',
    ];

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
            'cargo'     => $this->faker->randomElement(self::$cargos),
            'direccion' => $this->faker->streetAddress(),
            'ciudad'    => $this->faker->randomElement(self::$ciudades),
        ];
    }
}
