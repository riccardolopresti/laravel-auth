<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 100; $i++) {
            $new_project = new Project();
            $new_project->name = $faker->name();
            $new_project->slug = Project::SlugGenerator($new_project->name);
            $new_project->client_name = $faker->company();
            $new_project->summary = $faker->paragraph();
            $new_project->save();
        }
    }
}
