<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class countrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path() . '/database/seeds/countries.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
