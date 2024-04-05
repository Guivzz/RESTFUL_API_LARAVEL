<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Seller;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seller = Seller::has('products')->get->random();
        $buyer = User::all()->except($seller->id)->random();

        return [
            'quantity' => fake()->numberBetween(1, 3),
            'buyer_id' => fake()->paragraph(1),
            'quantity' => fake()->numberBetween(1, 10),
            'product_id' => $seller->products->random(),
        ];
    }
}
