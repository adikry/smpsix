<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KefoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(5, 10)),
            'slug' => $this->faker->slug(),
            'user_id' => mt_rand(1, 3),
            'kategori_id' => 3
        ];
    }
}
