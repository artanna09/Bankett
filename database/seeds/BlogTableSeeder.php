<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'C:\wamp64\www\bankett\public\img\Small-mario.png';
        $base64 = $this->encode($path);
        
        DB::table('blog')->insert([
            'title' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et dictum magna. Aenean efficitur lacus id felis feugiat pellentesque. Quisque commodo leo elit, sit amet condimentum magna lobortis id. Maecenas sollicitudin risus dui, aliquam aliquet mauris euismod in. Maecenas efficitur eleifend augue eu commodo. Integer porttitor eget eros sed scelerisque. Aenean imperdiet est eu nibh iaculis scelerisque. Donec lorem metus, pretium dignissim tristique convallis, varius quis elit. Sed at dictum nulla. Fusce lacus diam, finibus ac vulputate in, ornare fermentum ligula. Vivamus bibendum mattis mauris, id consequat nisi venenatis eget.',
            'picture' => $base64,
            'user_id' => 1,
        ]);

        $path = 'C:\wamp64\www\bankett\public\img\336_front_banket - Copy.jpg';
        $base64 = $this->encode($path);
        DB::table('blog')->insert([
            'title' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et dictum magna. Aenean efficitur lacus id felis feugiat pellentesque. Quisque commodo leo elit, sit amet condimentum magna lobortis id. Maecenas sollicitudin risus dui, aliquam aliquet mauris euismod in. Maecenas efficitur eleifend augue eu commodo. Integer porttitor eget eros sed scelerisque. Aenean imperdiet est eu nibh iaculis scelerisque. Donec lorem metus, pretium dignissim tristique convallis, varius quis elit. Sed at dictum nulla. Fusce lacus diam, finibus ac vulputate in, ornare fermentum ligula. Vivamus bibendum mattis mauris, id consequat nisi venenatis eget.',
            'picture' => '',
            'user_id' => 1,
        ]);

        $path = 'C:\wamp64\www\bankett\public\img\hochzeitstorte_anschneiden_detail - Copy.jpg';
        $base64 = $this->encode($path);
        DB::table('blog')->insert([
            'title' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin et dictum magna. Aenean efficitur lacus id felis feugiat pellentesque. Quisque commodo leo elit, sit amet condimentum magna lobortis id. Maecenas sollicitudin risus dui, aliquam aliquet mauris euismod in. Maecenas efficitur eleifend augue eu commodo. Integer porttitor eget eros sed scelerisque. Aenean imperdiet est eu nibh iaculis scelerisque. Donec lorem metus, pretium dignissim tristique convallis, varius quis elit. Sed at dictum nulla. Fusce lacus diam, finibus ac vulputate in, ornare fermentum ligula. Vivamus bibendum mattis mauris, id consequat nisi venenatis eget.',
            'picture' => $base64,
            'user_id' => 1,
        ]);
    }

    private function encode($path){
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
}
