<?php

namespace Database\Factories;

use App\Models\Conntect;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConntectFactory extends Factory {

    protected $model = Conntect::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guru_id'   => $this->faker->numberBetween(1, 20),
            'instagram' => $this->faker->optional()->url,
            'facebook'  => $this->faker->optional()->url,
            'twitter'   => $this->faker->optional()->url,
        ];
    }

}
