<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Anna",
            'surname' => "Lihushina",
            'email' => "artanna09@inbox.lv",
            'phone' => "25547913",
            'password' => bcrypt('Test112'),
            'role_id' => "1",
            'picture' => "noimage.png"
        ]);
        DB::table('users')->insert([
            'name' => "Test",
            'surname' => "User",
            'email' => "test@test.lv",
            'phone' => "24567852",
            'password' => bcrypt('Test112'),
            'role_id' => "2",
            'picture' => "noimage.png"
        ]);

    }
}
