<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    private $contador = 4;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sexo = $this->faker->randomElement(['Masculino', 'Femenino']);
        return [
            'user_id' => $this->contador++,
            'nombre' => $this->faker->name(),
            'apellido_paterno' => $this->faker->lastname(),
            'apellido_materno' => $this->faker->lastname(),
            'fecha_nacimiento' => $this->faker->date('d_m_Y'),
            'sexo' => $sexo,
            'codigo' => $this->faker->randomDigit,
            'nrc' => $this->faker->randomDigit,
        ];
    }
}
