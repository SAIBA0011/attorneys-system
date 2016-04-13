<?php

use App\Models\UserProfile;
use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Tiaan Theunissen',
            'is_admin' => true,
            'email' => 'tiaant@saiba.org.za',
            'password' => bcrypt('password')
        ]);
        $user->profile()->save(new UserProfile);
        return $user;
        }
    }
