<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserInfo;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstNames = ['', 'Tim', 'Alec', 'Josh', 'Tony', 'Edgar', 'Jazmin', 'Zane', 'Mikkal', 'Nikitha', 'Raima', 'Earl', 'Josh', 'Ekene', 'Michael', 'Zay', 'Yazmin', 'Steve', 'Luis', 'Bill', 'Steamboat', 'Morgan', 'Carlos', 'Jaime', 'Melissa', 'Tiffany', 'John'];
        $lastNames = ['', 'Brambaugh', 'Marcum', 'Magaleno', 'Pharo', 'Cano', 'Perez', 'Ervin', 'McNulty', 'Batchu', 'Hossain', 'Madjus', 'Arco', 'Akpati', 'Chan', 'Toven', 'Peebles', 'Fitzgerald', 'Guzman', 'Gates', 'McNutty', 'Louis', 'Benavides', 'Garcia', 'Ibara', 'Navales', 'Aquino'];
        for($id = 1; $id <= 26; $id +=1)
        {
            $student = User::create([
                'id' => $id,
                'verified' => 1,
                'email' => 'fake' . $id . '@gmail.com',
                'password' => 'fake12345',
            ]);
            $student->roles()->attach(1);
            $student_info = UserInfo::create([
                'id' => $id,
                'user_id' => $id,
                'first_name' => $firstNames[$id],
                'last_name' => $lastNames[$id],
                'title' => 'Student',
                'major' => 'Computer Science',
                'units' => 17,
                'grad_date' => 'Spring 2020',
                'college' => 'Engineering',
                'bio' => 'Now this is a story all about how
                My life got flipped turned upside down
                And Id like to take a minute, just sit right there',
                'research' => 'Something',
                'academic_interest' => 'Computers'
            ]);
        }
    }
}
