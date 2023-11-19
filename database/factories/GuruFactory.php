<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name('male'),
            'nip' => $this->faker->nik(),
            'jk' => 'Laki-laki',
            'mapel' => $this->faker->jobTitle(),
            'status' => 1,
            'user_id' => mt_rand(1, 3)
        ];
    }
}
