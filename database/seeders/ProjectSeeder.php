<?php

namespace Database\Seeders;

use App\Enums\GitForgeEnum;
use App\Enums\ProjectStatusEnum;
use App\Enums\WebsiteEnum;
use App\Models\Group;
use App\Models\Project;
use App\Models\Repository;
use App\Models\Technology;
use App\Models\Website;
use File;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $json = File::get(database_path('seeders/data/projects/personal.json'));
        // $data = json_decode($json);

        // foreach ($data as $item) {
        //     $item->project->project_status = ProjectStatusEnum::tryFromCase($item?->project?->project_status);
        //     $project = Project::create((array) $item?->project);

        //     /**
        //      * Set image.
        //      */
        //     $original_path = $item?->project?->image;
        //     $path = str_replace('projects/', '', $original_path);
        //     $file = File::get(database_path("seeders/media/projects/{$path}"));
        //     File::makeDirectory(public_path('storage/projects'), 0755, true, true);
        //     File::put(public_path("storage/{$original_path}"), $file);

        //     if (property_exists($item, 'group')) {
        //         $group = Group::firstOrCreate((array) $item->group);
        //         $project->group()->associate($group);
        //     }

        //     if (property_exists($item, 'repositories')) {
        //         $repositories = [];
        //         foreach ($item->repositories as $repository) {
        //             $repository->forge_type = property_exists($repository, 'forge_type') ? GitForgeEnum::tryFromCase($repository->forge_type) : null;
        //             array_push($repositories, Repository::create((array) $repository));
        //         }
        //         $project->repositories()->saveMany($repositories);
        //         $project->mainRepository()->associate($repositories[0]);
        //     }

        //     if (property_exists($item, 'technologies')) {
        //         $technologies = [];
        //         foreach ($item->technologies as $technology) {
        //             array_push($technologies, Technology::whereSlug($technology)->first());
        //         }
        //         $project->technologies()->saveMany($technologies);
        //         $project->mainTechnology()->associate($technologies[0]);
        //     }

        //     if (property_exists($item, 'websites')) {
        //         $websites = [];
        //         foreach ($item->websites as $website) {
        //             $website->website_type = property_exists($website, 'website_type') ? WebsiteEnum::tryFromCase($website->website_type) : null;
        //             array_push($websites, Website::create((array) $website));
        //         }
        //         $project->websites()->saveMany($websites);
        //         $project->mainWebsite()->associate($websites[0]);
        //     }

        //     $project->saveQuietly();
        // }

        Project::factory(25)->create();
    }
}
