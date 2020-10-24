<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'department_name' => 'Recruitment'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Development'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Marketing'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Distribution'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Sales'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Advertising'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'HR'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Finance'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Data Analytics'
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Unassigned'
        ]);
    }
}
