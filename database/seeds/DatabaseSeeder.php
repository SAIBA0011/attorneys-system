<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
         $this->call(AdminSeeder::class);
//         $this->call(HomePageSeeder::class);
//         $this->call(AboutUsSeeder::class);
//         $this->call(SpeakerSeeder::class);
//            $this->call(CategorySeeder::class);
//            $this->call(CategorySeeder::class);
//            $this->call(EmailSeeder::class);
//         $this->call(PartnerSeeder::class);
    }
}
