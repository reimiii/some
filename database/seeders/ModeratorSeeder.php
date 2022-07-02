<?php

namespace Database\Seeders;

use App\Models\Moderator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ModeratorSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moderator = [
            'name'     => 'Moderator',
            'email'    => 'imiia75775@gmail.com',
            'password' => Hash::make('password'),
            'status'   => 'active',
        ];
        Moderator::create($moderator);
    }

}
