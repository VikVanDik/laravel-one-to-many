<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Front-End', 'Back-End', 'Mobile', 'Web', 'Full-Stack'];
        foreach ($data as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->save();
        }
    }
}
