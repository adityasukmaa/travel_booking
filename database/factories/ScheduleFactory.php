<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hari' => $this->faker->dayOfWeek, // Nama hari dalam seminggu
            'waktu_keberangkatan' => $this->faker->time('H:i'), // Waktu keberangkatan dalam format HH:MM
        ];
    }
}
