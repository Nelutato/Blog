<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecepieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recepies')->insert([
            'user_id' => '1',
            'primary' => '1',
            'body' => 'Some Text In Body of recepie',
            'title' => 'Title',
            'ingredients' => 'water , other ingredients',
            'image' => 'Pad-Thai-test.jpg',
        ]);
    }
}
