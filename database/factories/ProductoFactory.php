<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductmodelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'cantidad'=> $this->faker->numberBetween(1,300),
            'precio'=> $this->faker->randomFloat(100,100000),
            'descripcion'=> $this->faker->text()
        ];
    }
}
