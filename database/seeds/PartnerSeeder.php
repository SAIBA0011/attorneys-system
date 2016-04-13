<?php

use App\Models\Partner;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PartnerSeeder extends Seeder
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
            Partner::create([
                'title' => $faker->name,
                'email' => $faker->email,
                'website' => $faker->url,
                'description' => $faker->paragraph,
                'contact_number' => $faker->phoneNumber,
            ]);
        }
    }
}
