<?php

use App\Models\Speaker;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,20) as $index)
        {
            Speaker::create([
                'full_name' => $faker->name,
                'organisation' => $faker->company,
                'job_title' => $faker->text('10'),
                'bio' => $faker->paragraph,
                'contact_number' => $faker->phoneNumber,
                'email' => $faker->email,
                'website' => $faker->url,
            ]);
        }
    }
}
