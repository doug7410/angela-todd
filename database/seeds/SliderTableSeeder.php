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
            'image' => 'img/banners/IMG_4424.jpg',
            'order' => 1
        ]);
        Slider::create([
            'image' => 'img/banners/IMG_4490.jpg',
            'order' => 2
        ]);
    }
}
