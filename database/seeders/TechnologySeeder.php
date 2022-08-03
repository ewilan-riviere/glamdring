<?php

namespace Database\Seeders;

use App\Models\Technology;
use File;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $json = File::get(database_path('seeders/data/technologies.json'));
        $data = json_decode($json, true);
        File::makeDirectory(public_path('storage/technologies'), 0755, true, true);

        foreach ($data as $technology) {
            $technology = Technology::create($technology);

            $path = database_path("seeders/media/technologies/{$technology->slug}.svg");
            if (File::exists($path)) {
                $file = File::get($path);
                File::put(public_path("storage/technologies/{$technology->slug}.svg"), $file);
            }
            $technology->image = "technologies/{$technology->slug}.svg";
            $technology->save();
        }
    }
}
