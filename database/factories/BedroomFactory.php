<?php

namespace Database\Factories;

use App\Models\Bedroom;
use Illuminate\Database\Eloquent\Factories\Factory;

class BedroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Bedroom::class;

    public function definition()
    {
        return [
        'number'=>$this->faker->numberBetween(1,9),
        'floor_count'=>$this->faker->numberBetween(1,8),
        'room_count'=>$this->faker->numberBetween(50,200)

        ];
    }
}
