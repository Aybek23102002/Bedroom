<?php

namespace Database\Factories;

use App\Models\Bedroom;
use App\Models\Floor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FloorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Floor::class;
    public function definition()
    {
        return [
            'bedroom_id'=>Bedroom::inRandomOrder()->first()->id,
            'number'=>$this->faker->numberBetween(1,8)
        ];
    }
}
