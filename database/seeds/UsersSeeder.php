<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => 'one',
            'email' => 'admin1@admin.com',
            'password' => Hash::make('987654321'),
            'email_verified_at' => now(),
            'DOB' => now(),
            'company_name' => 'KiwiTech',
            'user_type' => 'admin',
            'department_id' => 4,
            'phone' => '9876543210',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => 'two',
            'email' => 'admin2@admin.com',
            'password' => Hash::make('987654321'),
            'email_verified_at' => now(),
            'DOB' => now(),
            'company_name' => 'KiwiTech',
            'user_type' => 'admin',
            'department_id' => 7,
            'phone' => '9876543210',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    
        DB::table('users')->insert([
            'first_name' => 'user',
            'last_name' => 'one',
            'email' => 'user1@user.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'DOB' => now(),
            'company_name' => 'KiwiTech',
            'user_type' => 'regular',
            'department_id' => 2,
            'phone' => '9876543210',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        
        DB::table('users')->insert([
            'first_name' => 'user',
            'last_name' => 'two',
            'email' => 'user2@user.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'DOB' => now(),
            'company_name' => 'KiwiTech',
            'user_type' => 'regular',
            'department_id' => 3,
            'phone' => '9876543210',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    
        DB::table('users')->insert([
            'first_name' => 'user',
            'last_name' => 'three',
            'email' => 'user3@user.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'DOB' => now(),
            'company_name' => 'KiwiTech',
            'user_type' => 'regular',
            'department_id' => 9,
            'phone' => '9876543210',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
