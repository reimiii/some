<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class ModeratorFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'password'          => Hash::make('password'),
            'status'            => $this->faker->randomElement(['active', 'non-active']),
        ];
    }

}
