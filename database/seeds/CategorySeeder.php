<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'title' => 'Gold Sponsors',
            'description' => 'None',
            'position' => '1'
        ]);

        Category::create([
            'title' => 'Silver Sponsors',
            'description' => 'None',
            'position' => '2'
        ]);

        Category::create([
            'title' => 'Bronze Sponsors',
            'description' => 'None',
            'position' => '3'
        ]);

        Category::create([
            'title' => 'Media Partner',
            'description' => 'None',
            'position' => '4'
        ]);

        Category::create([
            'title' => 'Exhibitor',
            'description' => 'None',
            'position' => '5'
        ]);
    }
}
