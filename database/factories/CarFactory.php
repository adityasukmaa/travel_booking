<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merk' => $this->faker->company, // Menggunakan company untuk merk mobil
            'model' => $this->faker->word, // Menggunakan word untuk model mobil
            'tahun' => $this->faker->year, // Menggunakan year untuk tahun
            'nomor_polisi' => $this->faker->bothify('?? #### ??'), // Menggunakan bothify untuk format nomor polisi
            'kapasitas' => $this->faker->numberBetween(4, 20), // Menggunakan numberBetween untuk kapasitas
            'status_mobil' => $this->faker->randomElement(['Tersedia', 'Tidak Tersedia']), // Random element untuk status
        ];
    }
}
