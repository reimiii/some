<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory {

    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guru_id'      => $this->faker->numberBetween(1, 20),
            'nama_kelas'   => $this->faker->name,
            'kode_kelas'   => $this->faker->unique()->numberBetween(1, 100),
            'jumlah_siswa' => $this->faker->numberBetween(1, 100),
            'keterangan'   => $this->faker->paragraph(5),
        ];
    }

}
