<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->words(asText: true)),
            'description' => $this->faker->paragraph(),
            'image' => '',
            'is_open_source' => $this->faker->boolean(30),
            'pipeline' => $this->faker->boolean(60),
            'begin_at' => $this->faker->dateTime(),
        ];
    }
}
