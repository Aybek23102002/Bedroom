<?php

namespace Database\Factories;

use App\Models\Floor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number'=>$this->faker->numberBetween(1,8),
            'floor_id'=>Floor::inRandomOrder()->first()->id,
            'status'=>$this->faker->boolean()
        ];
    }
}
