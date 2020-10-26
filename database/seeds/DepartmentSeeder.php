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
            'department_name' => 'Unassigned',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Recruitment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Development',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Marketing',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Distribution',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Sales',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Advertising',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'HR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Finance',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Data Analytics',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }
}
