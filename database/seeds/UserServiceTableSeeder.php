<?php

use Illuminate\Database\Seeder;

class UserServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_service')->insert([
            'user_id' => 1,
            'service_id' => 1,
        ]);
        DB::table('user_service')->insert([
            'user_id' => 1,
            'service_id' => 2,
        ]);
        DB::table('user_service')->insert([
            'user_id' => 1,
            'service_id' => 3,
        ]);
        DB::table('user_service')->insert([
            'user_id' => 2,
            'service_id' => 2,
        ]);
        DB::table('user_service')->insert([
            'user_id' => 2,
            'service_id' => 3,
        ]);
    
    }
}
