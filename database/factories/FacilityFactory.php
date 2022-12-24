<?php

namespace Database\Factories;

use App\Models\Facility;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Facility::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->name(),
            'description' => fake()->text(),
            'tour_id' => rand(1,10)
        ];
    }
}
