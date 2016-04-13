<?php

use App\Models\Newsletter;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,50) as $index)
        {
                Newsletter::create([
                'name' => $faker->text(10),
                'email' => $faker->email,
            ]);
        }
    }
}
