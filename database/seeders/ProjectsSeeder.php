<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;


class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(Faker $faker)
    {
        for ($i=0; $i<10; $i++) {
        $new_project = new Project();
        $new_project->type_id = Type::inRandomOrder()->first()->id;
        $new_project->name = $faker->name;
        $new_project->creation = $faker->date();
        $new_project->slug = Project::generateSlug($new_project->name);
        $new_project->url = $faker->url;
        $new_project->description = $faker->paragraph;
        $new_project->save();
    }
}
}
