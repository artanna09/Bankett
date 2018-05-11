<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service')->insert([
            'title' => "Bankets!",
            'adress' => "Rīga",
            'price' => "Desmit eiro",
            'contact_information' => "e-pasts: test2@gmail.com un talrunis: 23514795",
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            'photo' => "image01.jpg",
            'extra_service' => "Pellentesque sodales dictum metus quis tempor",
            'person_number' => "Divas personas",
            'service_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('service')->insert([
            'title' => "Koncerts Max Korzh",
            'adress' => "Salaspils",
            'price' => "10.09 par cilvēku",
            'contact_information' => "e-pasts: variable@gmail.com un talrunis: 25463187",
            'description' => "Praesent egestas, erat at imperdiet lacinia, lectus orci dignissim elit, sit amet dignissim justo quam eget metus",
            'photo' => "large.jpg",
            'extra_service' => "Nulla nec lobortis nulla, in tempus lectus",
            'person_number' => "2 - 20",
            'service_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('service')->insert([
            'title' => "Fotografēšanas sessija",
            'adress' => "Ogre",
            'price' => "10 eiro",
            'contact_information' => "e-pasts: asdasd@gmail.com un talrunis: 12341243",
            'description' => "Nam et volutpat purus",
            'photo' => "normal (1).jpg",
            'extra_service' => "Quisque commodo aliquet eros eget tempor",
            'person_number' => "Līdz 10",
            'service_type_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
