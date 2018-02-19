<?php

namespace App\Http\Controllers;

use App\Slider;

class AngieController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('angie', ['sliders' => $sliders]);
    }
}
