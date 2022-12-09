<?php

namespace App\Http\Controllers;

use App\Models\CarouselSlider;
use Illuminate\Http\Request;

class CarouselSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = CarouselSlider::all();
        return response()->json([
            'success' => true,
            'data'=> $carousel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carousel = CarouselSlider::create([
            'image' => $request->image,
        ]);
        return response()->json([
            'success' => true,
            'data'=> $carousel
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarouselSlider  $carouselSlider
     * @return \Illuminate\Http\Response
     */
    public function show(CarouselSlider $carouselSlider)
    {
        return $carouselSlider->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarouselSlider  $carouselSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarouselSlider $carouselSlider)
    {
        $carouselSlider->image = $request->image;
        $carouselSlider->save();

        return response()->json([
            'data' => $carouselSlider
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarouselSlider  $carouselSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarouselSlider $carouselSlider)
    {
        //
    }
}
