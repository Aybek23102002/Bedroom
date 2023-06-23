<?php

namespace Database\Factories;

use App\Models\Bedroom;
use App\Models\Floor;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bedroom_id'=>Bedroom::inRandomOrder()->first()->id,
            'floor_id'=>Floor::inRandomOrder()->first()->id,
            'section_id'=>Section::inRandomOrder()->first()->id,
            'number'=>$this->faker->numberBetween(1,60),
            'status'=>$this->faker->boolean()
        ];
    }
}
