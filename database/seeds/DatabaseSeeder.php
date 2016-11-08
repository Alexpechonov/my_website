<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\Faculty;
use App\Speciality;
use App\Policy;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('GroupsSeeder');
        //$this->call('FacultySeeder');
        //$this->call('SpecialitySeeder');
        //$this->call('PoliciesSeeder');
    }
}

class FacultySeeder extends Seeder {

    public function run()
    {
        DB::table('faculties')->delete();
        Faculty::create([
            'name' => 'КСиС',
            'description' => 'Компьтерные системы и сети',
        ]);
    }
}

class SpecialitySeeder extends Seeder {

    public function run()
    {
        DB::table('Specialities')->delete();
        Speciality::create([
            'name' => 'ВМСиС',
            'faculty_id' => '1',
            'department' => 'КСиС'
        ]);
    }
}

class GroupsSeeder extends Seeder {

    public function run()
    {
        DB::table('Groups')->delete();
        Group::create([
            'number' => '450502',
            'speciality_id' => '1',
            'faculty_id' => '1'
        ]);
    }
}

class PoliciesSeeder extends Seeder {

    public function run()
    {
        DB::table('policies')->delete();

        Policy::create([
            'name' => 'Administrator',
        ]);
        Policy::create([
            'name' => 'Student',
        ]);
        Policy::create([
            'name' => 'Teacher',
        ]);
    }
}