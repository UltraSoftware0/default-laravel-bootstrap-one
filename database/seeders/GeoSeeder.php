<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        if (Schema::hasTable('geo_countries')) {
            DB::table('geo_countries')->truncate();
        }
        $countries_sql = file_get_contents(base_path('database/sql/geo/geo_countries.sql'));
        DB::unprepared($countries_sql);

        if (Schema::hasTable('geo_sub_continents')) {
            DB::table('geo_sub_continents')->truncate();
        }
        $sub_continents_sql = file_get_contents(base_path('database/sql/geo/geo_sub_continents.sql'));
        DB::unprepared($sub_continents_sql);

        if (Schema::hasTable('geo_continents')) {
            DB::table('geo_continents')->truncate();
        }
        $continents_sql = file_get_contents(base_path('database/sql/geo/geo_continents.sql'));
        DB::unprepared($continents_sql);

        if (Schema::hasTable('geo_zones')) {
            DB::table('geo_zones')->truncate();
        }
        $zones_sql = file_get_contents(base_path('database/sql/geo/geo_zones.sql'));
        DB::unprepared($zones_sql);

        if (Schema::hasTable('geo_provinces')) {
            DB::table('geo_provinces')->truncate();
        }
        $provinces_sql = file_get_contents(base_path('database/sql/geo/geo_provinces.sql'));
        DB::unprepared($provinces_sql);

        if (Schema::hasTable('geo_casa')) {
            DB::table('geo_casa')->truncate();
        }
        $casa_sql = file_get_contents(base_path('database/sql/geo/geo_casa.sql'));
        DB::unprepared($casa_sql);

        if (Schema::hasTable('geo_districts')) {
            DB::table('geo_districts')->truncate();
        }
        $districts_sql = file_get_contents(base_path('database/sql/geo/geo_districts.sql'));
        DB::unprepared($districts_sql);

        if (Schema::hasTable('geo_currencies')) {
            DB::table('geo_currencies')->truncate();
        }
        $currencies_sql = file_get_contents(base_path('database/sql/geo/geo_currencies.sql'));
        DB::unprepared($currencies_sql);

        if (Schema::hasTable('geo_countries_currencies')) {
            DB::table('geo_countries_currencies')->truncate();
        }
        $countries_currencies_sql = file_get_contents(base_path('database/sql/geo/geo_countries_currencies.sql'));
        DB::unprepared($countries_currencies_sql);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
