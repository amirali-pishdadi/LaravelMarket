<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            "user_id" => 5 , 
            "order_date" => fake()->dateTime,
            "total_amount" => fake()-> buildingNumber ,
            "shipping_address" => fake()->address , 
            "is_paid" => false,
        ];
    }
}
