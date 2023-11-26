<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use IanRodrigo\Faker\Provider\Lorem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 6),
            'categoria_id' => fake()->numberBetween(1, 500),
            'titulo' => fake() -> word,
            'contenido' => fake() -> sentence,
            'fecha' => fake() ->date,
            'etiqueta' => fake() -> word,
            'color' => $this->faker->hexColor, 
        ];
    }
}
