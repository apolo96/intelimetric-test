<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Restaurant::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $restaurant = Restaurant::create([
            'uuid' => Uuid::generate()->string,
            'name' => $request->name,
            'rating' => $request->rating,
            'site' => $request->site,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);

        return response()->json($restaurant,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {

        $restaurant->update($request->all());
        return response()->json($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Restaurant $restaurant)
    {
        return response()->json($restaurant->delete(),202);
    }
}
