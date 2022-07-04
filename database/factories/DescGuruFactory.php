<?php

namespace Database\Factories;

use App\Models\DescGuru;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescGuruFactory extends Factory {

    protected $model = DescGuru::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guru_id'   => $this->faker->numberBetween(1, 20),
            'phone'     => $this->faker->phoneNumber,
            'education' => $this->faker->paragraph(2),
            'experience'=> $this->faker->paragraph(2),
        ];
    }

}
