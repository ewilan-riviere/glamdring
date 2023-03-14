<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        File::deleteDirectory(public_path('storage/projects'));
        File::deleteDirectory(public_path('storage/technologies'));

        $seeds = [
            EmptySeeder::class,
            TechnologySeeder::class,
        ];

        if ('local' === config('app.env')) {
            $seeds = [
                ...$seeds,
                ProjectSeeder::class,
                SubmissionSeeder::class,
            ];
        }

        $this->call($seeds);
    }
}
