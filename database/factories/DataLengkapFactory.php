<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataLengkap>
 */
class DataLengkapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(3, 7),
            'kecamatan_id' => fake()->numberBetween(1, 10),
            'kelurahan_id' => fake()->numberBetween(1, 25),
            'rt' => fake()->numerify('0#'),
            'rw' => fake()->numerify('0#'),
            'no_tps' => fake()->randomNumber(4, false),
            'total_dpt' => fake()->randomNumber(3, true),
            'total_sss' => fake()->randomNumber(3, true),
            'total_ssts' => fake()->randomNumber(3, false),
            'total_ssr' => fake()->randomNumber(2, false),
            'pemilih_hadir' => fake()->randomNumber(3, true),
            'pemilih_tidak_hadir' => fake()->randomNumber(1, true),
            'caleg_id' => fake()->numberBetween(1, 2),
            'perolehan_suara' => fake()->randomNumber(2, true),
            'image' => 'image/plano/mOUM1sAsB3KQh2FMbTM7MoNOkst6rkMxVe6fdTCT.jpg',
        ];
    }
}
