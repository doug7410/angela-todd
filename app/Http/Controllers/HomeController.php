<?php

namespace App\Http\Controllers;

use App\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();

        return view('home', ['sliders' => $sliders]);
    }
}
