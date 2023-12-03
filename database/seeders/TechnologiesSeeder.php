<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL', 'SCSS', 'Vue', 'Node.js', 'Vite.js', 'Laravel', 'Bootstrat'];
        foreach ($data as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology;
            $new_technology->save();
        }
    }
}
