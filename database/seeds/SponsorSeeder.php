<?php

use App\Models\Sponsor;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,5) as $index)
        {
            Sponsor::create([
                'title' => $faker->text(10),
                'description' => $faker->paragraph,
                'category_id' => $faker->numberBetween('1', '5'),
                'contact_number' => $faker->phoneNumber,
                'email' => $faker->email,
                'website' => $faker->url,
            ]);
        }
    }
}
