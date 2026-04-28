<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;

    private static array $ciudades = [
        'Bogotá', 'Medellín', 'Cali', 'Barranquilla', 'Cartagena',
        'Bucaramanga', 'Pereira', 'Manizales', 'Santa Marta', 'Cúcuta',
    ];

    private static array $mercancias = [
        'Cuero', 'Suela', 'Tela', 'Hilo', 'Pegante',
        'Plantillas', 'Herrajes', 'Cordones', 'Espuma', 'Caucho',
    ];

    public function definition(): array
    {
        return [
            'nombre'           => $this->faker->name(),
            'empresa'          => $this->faker->company(),
            'documento'        => $this->faker->unique()->numerify('##########'),
            'telefono'         => $this->faker->numerify('3##-###-####'),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'correo'           => $this->faker->unique()->safeEmail(),
            'ciudad'           => $this->faker->randomElement(self::$ciudades),
            'direccion'        => $this->faker->streetAddress(),
            'mercancia'        => $this->faker->randomElement(self::$mercancias),
        ];
    }
}
