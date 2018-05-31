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
            'extra_service' => "Mēs papildus piedāvājam parkošanu un bezmaksas fotogrāfu!",
            'district' => "Purvciems",
            'adress' => "Staiceles iela 5",
            'price' => 300,
            'email' => "test2@gmail.com",
            'phone' => "23514795",
            'person_number_from' => 15,
            'person_number_to' => 50,
            'description' => "Jūsu bankets būs neaizmirstams.",
            'photo' => "image01.jpg",
            'service_type_id' => 1,
        ]);
        DB::table('service')->insert([
            'title' => "Lorem ipsum dolor sit amet.",
            'extra_service' => "Phasellus consectetur erat ante, sed luctus metus malesuada vitae. In mauris dui, pharetra ut nibh vitae, venenatis sodales dolor.",
            'district' => "Pļavnieki",
            'adress' => "Audēju iela 5",
            'price' => 15,
            'email' => "lipsum@lipsum.org",
            'phone' => "27845178",
            'person_number_from' => 10,
            'person_number_to' => 10,
            'description' => "Nunc semper enim ante, sed imperdiet tellus imperdiet id. Fusce ac magna leo. Duis mattis faucibus ante, sit amet consectetur ipsum ullamcorper vitae. Nullam condimentum elementum sem, at tincidunt mauris commodo non. Suspendisse ornare fermentum elit faucibus ultrices. Ut a diam euismod lacus commodo condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam posuere in mauris at elementum. Maecenas pulvinar lorem id mauris blandit laoreet. ",
            'photo' => "large.jpg",
            'service_type_id' => 2,
        ]);
        DB::table('service')->insert([
            'title' => "Quisque congue consequat tempus.",
            'extra_service' => "Sed euismod, massa vitae condimentum egestas, diam diam euismod enim, ut lobortis purus justo et dolor. Sed eget risus sit amet leo maximus mollis. Curabitur ultrices aliquam congue.",
            'district' => "Centrs",
            'adress' => "Miķeļa iela 22",
            'price' => 10,
            'email' => "anyone@gmail.com",
            'phone' => "26325147",
            'person_number_from' => 1,
            'person_number_to' => 10,
            'description' => "Duis sed auctor diam. Suspendisse porttitor quam porta elementum vehicula. Ut ante est, porttitor at augue ut, sodales euismod massa. Integer fermentum purus sed nisl congue, a malesuada arcu feugiat. Nulla euismod porta felis sit amet placerat. Suspendisse lacinia, purus nec condimentum placerat, nisl purus luctus lectus, laoreet pulvinar nisl massa vel massa. Etiam justo nisl, viverra in dolor sit amet, imperdiet congue nulla. Ut sollicitudin, lectus sed vehicula consequat, nulla justo feugiat nibh, quis viverra libero enim in nibh.",
            'photo' => "normal (1).jpg",
            'service_type_id' => 3,
        ]);
    }
}
