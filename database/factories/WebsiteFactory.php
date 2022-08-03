<?php

namespace Database\Factories;

use App\Enums\WebsiteEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credential>
 */
class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $with_credentials = $this->faker->boolean();

        return [
            'url' => $this->faker->url(),
            'website_type' => $this->faker->randomElement(WebsiteEnum::cases()),
            'with_credentials' => $with_credentials,
            'login' => $with_credentials ? $this->faker->userName() : '',
            'password' => $with_credentials ? $this->faker->password() : '',
        ];
    }
}
