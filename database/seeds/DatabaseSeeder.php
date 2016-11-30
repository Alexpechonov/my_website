<?php

use App\Faculty;
use App\Policy;
use App\Speciality;
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
        $this->call('FacultySeeder');
        $this->call('SpecialitySeeder');
        $this->call('PoliciesSeeder');
    }
}

class FacultySeeder extends Seeder
{
    public function run()
    {
        DB::table('faculties')->delete();
        Faculty::create([
            'name'        => 'КСиС',
            'description' => 'Компьтерные системы и сети',
        ]);
    }
}

class SpecialitySeeder extends Seeder
{
    public function run()
    {
        DB::table('specialities')->delete();
        Speciality::create([
            'name'       => 'ВМСиС',
            'faculty_id' => '1',
            'department' => 'КСиС',
        ]);
    }
}

class PoliciesSeeder extends Seeder
{
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
