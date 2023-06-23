<?php

namespace Database\Seeders;

use App\Models\Bedroom;
use Illuminate\Database\Seeder;

class BedroomSeeder extends Seeder
{
    
    public function run()
    {
        Bedroom::factory(9)->create();
    }
}
