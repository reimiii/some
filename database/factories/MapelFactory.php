<?php

namespace Database\Factories;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Factories\Factory;

class MapelFactory extends Factory {

    protected $model = Mapel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guru_id'    => $this->faker->numberBetween(1, 20),
            'nama_mapel' => $this->faker->name,
        ];
    }

}
