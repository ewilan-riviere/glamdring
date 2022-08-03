<?php

namespace Database\Seeders;

use File;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        File::deleteDirectory(public_path('storage/projects'));
        File::deleteDirectory(public_path('storage/technologies'));

        $seeds = [
            EmptySeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class,
        ];

        if ('local' === config('app.env')) {
            $seeds = [
                ...$seeds,
                SubmissionSeeder::class,
            ];
        }

        $this->call($seeds);
    }

    public function parseJson(string $jsonPath)
    {
        if (File::exists($jsonPath)) {
            $json = File::get($jsonPath);
        }

        return false;
    }
}
