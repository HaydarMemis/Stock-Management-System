<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse_Stock>
 */
class WarehouseStockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pieces' => fake()->randomDigit(),
            'receipt_place' => fake()->creditCardDetails(),
            'issue_place' => fake()->creditCardDetails(),
            'report' => fake()->file(),
        ];
    }
}
