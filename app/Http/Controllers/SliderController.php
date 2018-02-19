<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function store(Request $request) {
        $imagePath = $request->image->store('public/sliders');
        $fileName = str_replace('public/sliders/', '', $imagePath);

        $position = Slider::all()->count() + 1;
        $slider = Slider::create([
            'image' => str_replace('public/sliders/', '', $fileName),
            'order' => $position,
            'name'  => $request->image->getClientOriginalName()
        ]);
        return response()->json($slider, 200);
    }

    public function delete($id) {
        Slider::destroy($id);
        return $id;
    }

    public function update(Request $request) {
        foreach ($request->all() as $key => $slider){
            $s = Slider::find($slider['id']);
            $s->order = $key+1;
            $s->save();
        }

        return response()->json([], 200);
    }
}
