<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserInfo;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make("password"),
            'verified' => 1
        ]);
        $admin->roles()->attach(2);
        UserInfo::create([
            'id' => 1,
            'user_id' => 1,
            'first_name' => 'Steve',
            'last_name' => 'Fitzgerald',
            'title' => 'Administrator',
            'archive' => 0
        ]);
    }
}
