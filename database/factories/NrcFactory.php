<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NrcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nrc' => $this->faker->randomNumber(7, true),
            'materia' => $this->faker->words(2, true),
        ];
    }
}
