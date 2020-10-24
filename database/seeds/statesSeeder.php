<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path() . '/database/seeds/states.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
