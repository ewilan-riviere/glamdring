<?php

namespace Database\Factories;

use App\Enums\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

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
        $name = $this->faker->words(asText: true);
        return [
            'git_id' => $this->faker->randomNumber(),
            'name' => ucfirst($name),
            'path' => Str::slug($name),
            'description' => $this->faker->paragraph(),
            'default_branch' => 'main',
            'git_created_at' => $this->faker->dateTime(),
            'git_updated_at' => $this->faker->dateTime(),
            'web_url' => $this->faker->url(),
            'clone_url' => $this->faker->url(),
            'avatar_url' => $this->faker->url(),
            'readme_raw' => $this->faker->url(),
            'visibility' => 'public',
            'is_open_source' => $this->faker->boolean(30),

            'project_status' => $this->faker->randomElement(ProjectStatusEnum::cases()),
            'pipeline' => $this->faker->boolean(60),

            // 'repository_id',
            // 'technology_id',
            // 'website_id',
        ];
    }
}
