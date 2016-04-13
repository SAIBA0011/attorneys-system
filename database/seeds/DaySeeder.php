<?php

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create([
            'title' => 'Day One',
            'date' => '2016-03-01'
        ]);

        Day::create([
            'title' => 'Day Two',
            'date' => '2016-03-02'
        ]);

        Day::create([
            'title' => 'Day Three',
            'date' => '2016-03-03'
        ]);
    }
}
