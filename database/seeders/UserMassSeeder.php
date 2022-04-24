<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserMassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50);
    }
}
