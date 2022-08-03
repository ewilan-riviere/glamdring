<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'app' => "{$this->faker->company()} testing",
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'ip' => $this->faker->ipv4(),
            'url' => $this->faker->url(),
            'to' => config('mail.to.address'),
            'message' => $this->faker->paragraphs(3, true),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
