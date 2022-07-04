<?php

namespace Database\Seeders;

use App\Models\Role;
use Database\Factories\RoleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        \App\Models\Kelas::factory(20)->create();
//        \App\Models\Conntect::factory(20)->create();
//        \App\Models\DescGuru::factory(20)->create();
//        \App\Models\Mapel::factory(20)->create();

        \App\Models\User::factory(45)->create();
        \App\Models\Moderator::factory(10)->create();
        \App\Models\Guru::factory(5)->create();



        $this->call([
            ModeratorSeeder::class,
            KelasSeeder::class,
        ]);
    }

}
