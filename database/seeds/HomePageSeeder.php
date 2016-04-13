<?php

use App\Models\HomePage;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomePage::create([
            'title' => 'Schedule',
            'icon' => 'fa fa-calendar',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, amet cum deleniti eligendi hic illo laudantium',
        ]);

        HomePage::create([
            'title' => 'Speakers',
            'icon' => 'fa fa-microphone',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, amet cum deleniti eligendi hic illo laudantium',
        ]);

        HomePage::create([
            'title' => 'Sponsors',
            'icon' => 'fa fa-star',
            'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, amet cum deleniti eligendi hic illo laudantium',
        ]);
    }
}
