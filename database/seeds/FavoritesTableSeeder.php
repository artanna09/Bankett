<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->insert([
            'user_id' => 1,
            'service_id' => 1,
        ]);
        DB::table('favorites')->insert([
            'user_id' => 1,
            'service_id' => 2,
        ]);
        DB::table('favorites')->insert([
            'user_id' => 1,
            'service_id' => 3,
        ]);
        DB::table('favorites')->insert([
            'user_id' => 2,
            'service_id' => 2,
        ]);
        DB::table('favorites')->insert([
            'user_id' => 2,
            'service_id' => 3,
        ]);
    }
}
