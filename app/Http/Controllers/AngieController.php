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
        $sliders = Slider::all();
        return view('angie', ['sliders' => $sliders]);
    }
}
