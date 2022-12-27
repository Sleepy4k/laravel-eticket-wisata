<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * List data of translate.
     *
     * @var string
     */
    protected $translate = [];
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function init()
    {
        if (empty($this->translate)) {
            $this->translate = config()->get('language.list');
            
            if (empty($this->translate)) {
                throw new \Exception('Error: config/language.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }
        }
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake()->unique()->userName(),
            'name' => fake()->name(),
            'phone' => fake()->unique()->phoneNumber(),
            'password' => 'password'
        ];
    }
}
