<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];

        foreach ($sections as $section) {
            Section::create(['name' => $section]);
        }
    }
}
