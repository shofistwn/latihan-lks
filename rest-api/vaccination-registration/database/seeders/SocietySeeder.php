<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Society;

class SocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Society::create([
            'id_card_number' => 00001,
            'password' => \Hash::make('password'),
            'name' => 'Shofi Setiawan',
            'born_date' => '2004-07-03',
            'gender' => 'male',
            'address' => 'Gandusari',
            'regional_id' => 1,
        ]);
    }
}