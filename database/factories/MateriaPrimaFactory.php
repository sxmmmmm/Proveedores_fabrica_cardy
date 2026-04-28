<?php

namespace Database\Factories;

use App\Models\MateriaPrima;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaPrimaFactory extends Factory
{
    protected $model = MateriaPrima::class;

    private static array $tipos = [
        'Cuero natural', 'Cuero sintético', 'Tela', 'Caucho', 'Espuma',
        'Suela', 'Plantilla', 'Hilo', 'Pegante', 'Herraje',
    ];

    private static array $colores = [
        'Negro', 'Marrón', 'Blanco', 'Beige', 'Rojo',
        'Azul', 'Verde', 'Gris', 'Amarillo', 'Naranja',
    ];

    private static array $nombres = [
        'Cuero Vacuno', 'Cuero Cerdo', 'Tela Lona', 'Tela Mesh', 'Caucho Natural',
        'Espuma Alta Densidad', 'Suela TR', 'Suela PVC', 'Hilo Nylon', 'Pegante Amarillo',
        'Herraje Metálico', 'Plantilla Ortopédica', 'Cuero Nobuck', 'Tela Polar', 'Caucho Reciclado',
    ];

    public function definition(): array
    {
        return [
            'nombre'      => $this->faker->randomElement(self::$nombres) . ' ' . $this->faker->bothify('##?'),
            'tipo'        => $this->faker->randomElement(self::$tipos),
            'color'       => $this->faker->randomElement(self::$colores),
            'stock'       => $this->faker->numberBetween(10, 500),
            'precio'      => $this->faker->randomFloat(2, 5000, 150000),
            'empleado_id' => null, // se asigna en el seeder
        ];
    }
}
