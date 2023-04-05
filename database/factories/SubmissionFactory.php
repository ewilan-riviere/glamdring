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
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'message' => $this->faker->paragraphs(3, true),
            'extras' => $this->faker->words(5),

            'app_name' => "{$this->faker->company()} testing",
            'send_to' => config('mail.to.address'),
            'honeypot' => false,

            'host' => $this->faker->domainName(),
            'origin' => $this->faker->domainName(),
            'ip' => $this->faker->ipv4(),
        ];
    }
}
