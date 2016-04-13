<?php

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'title' => 'Lorem ipsum dolor sit amet, consectetur',
            'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci assumenda at aut dolorem eaque enim ipsa ipsum laudantium modi natus nobis quaerat quasi quis, repellat sequi soluta tempora temporibus.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci assumenda at aut dolorem eaque enim ipsa ipsum laudantium modi natus nobis quaerat quasi quis, repellat sequi soluta tempora temporibus.</p>']);
    }
}
