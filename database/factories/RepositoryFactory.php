<?php

namespace Database\Factories;

use App\Enums\GitForgeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repository>
 */
class RepositoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url(),
            'forge_type' => $this->faker->randomElement(GitForgeEnum::cases()),
        ];
    }
}
