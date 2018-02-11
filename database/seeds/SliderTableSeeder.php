<?php

use App\Slider;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'image' => 'img/banners/IMG_4779.jpg',
            'order' => 1
        ]);
    }
}
