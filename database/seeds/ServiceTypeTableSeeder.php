<?php

use Illuminate\Database\Seeder;

class ServiceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_type')->insert([
            'name' => "Banketu zāles",
        ]);
        DB::table('service_type')->insert([
            'name' => "Pasākumu organizatori",
        ]);
        DB::table('service_type')->insert([
            'name' => "Fotografi un operatori",
        ]);
        DB::table('service_type')->insert([
            'name' => "Mūzikas grupas un izpildītāji",
        ]);
        DB::table('service_type')->insert([
            'name' => "Dekorētāji",
        ]);
        DB::table('service_type')->insert([
            'name' => "Pasākumu vadītāji",
        ]);
    }
}
