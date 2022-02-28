<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('languages')) {
            DB::table('languages')->truncate();
        }
        $sql = file_get_contents(base_path('database/sql/languages.sql'));
        DB::unprepared($sql);
    }
}
