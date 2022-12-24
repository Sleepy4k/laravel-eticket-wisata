<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ticket_id' => rand(1,10),
            'amount' => rand(1,5),
            'total_price' => rand(20,100) . '000',
            'payment_date' => fake()->dateTimeBetween('-1 years', 'now'),
            'package_id' => rand(1,10),
            'user_id' => rand(1,10)
        ];
    }
}
