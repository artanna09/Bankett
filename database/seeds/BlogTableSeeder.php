<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('blog')->insert([
            'title' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et dictum magna. Aenean efficitur lacus id felis feugiat pellentesque. Quisque commodo leo elit, sit amet condimentum magna lobortis id. Maecenas sollicitudin risus dui, aliquam aliquet mauris euismod in. Maecenas efficitur eleifend augue eu commodo. Integer porttitor eget eros sed scelerisque. Aenean imperdiet est eu nibh iaculis scelerisque. Donec lorem metus, pretium dignissim tristique convallis, varius quis elit. Sed at dictum nulla. Fusce lacus diam, finibus ac vulputate in, ornare fermentum ligula. Vivamus bibendum mattis mauris, id consequat nisi venenatis eget.',
            'picture' => '336_front_banket - Copy.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('blog')->insert([
            'title' => "Nam et volutpat purus",
            'text' => 'Nam et volutpat purus. Quisque commodo aliquet eros eget tempor. Donec ultrices odio sed ligula ornare tempor. Vivamus viverra erat velit, posuere viverra metus varius eu.',
            'picture' => 'banket2.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('blog')->insert([
            'title' => "Proin finibus suscipit quam, et fermentum velit rhoncus in",
            'text' => 'Proin finibus suscipit quam, et fermentum velit rhoncus in. Maecenas erat lorem, rutrum ac ultricies semper, interdum quis quam. Etiam id augue quis felis commodo luctus non vel neque.',
            'picture' => 'hochzeitstorte_anschneiden_detail - Copy.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
