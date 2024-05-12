<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'publisher_id' => rand(1, 10), // Ubah sesuai dengan jumlah publisher yang Anda miliki
            'category_id' => rand(1, 5), // Ubah sesuai dengan jumlah category yang Anda miliki
            'price' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->paragraph(),
        ];
    }
}
