<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\Department;
use App\Speciality;

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
        $this->call('DepartmentsSeeder');
        $this->call('SpecialitiesSeeder');
    }
}
class GroupsSeeder extends Seeder {

    public function run()
    {
        DB::table('Groups')->delete();
        Group::create([
            'name' => '450502',
            'department' => 'KSiS',
            'speciality' => 'VMSiS'
        ]);
    }
}

class DepartmentsSeeder extends Seeder {

    public function run()
    {
        DB::table('Departments')->delete();
        Department::create([
            'name' => 'KSiS'
        ]);
    }
}

class SpecialitiesSeeder extends Seeder {

    public function run()
    {
        DB::table('Specialities')->delete();
        Speciality::create([
            'name' => 'VMSiS',
            'department' => 'KSis'
        ]);
    }
}