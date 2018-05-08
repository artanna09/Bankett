<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'type' => "Administrator",
        ]);
        DB::table('role')->insert([
            'type' => "User",
        ]);
    }
}
