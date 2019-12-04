<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Restaurant;
use Exception;
use Illuminate\Http\JsonResponse;
use Webpatser\Uuid\Uuid;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Restaurant::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RestaurantRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(RestaurantRequest $request)
    {
        $request = $request->validated();
        $request['uuid'] = Uuid::generate()->string;
        $restaurant = Restaurant::create($request);

        return response()->json($restaurant,201);
    }

    /**
     * Display the specified resource.
     *
     * @param Restaurant $restaurant
     * @return JsonResponse
     */
    public function show(Restaurant $restaurant)
    {
        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RestaurantRequest $request
     * @param Restaurant $restaurant
     * @return JsonResponse
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $request = $request->validated();
        $restaurant->update($request);
        return response()->json($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Restaurant $restaurant
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Restaurant $restaurant)
    {
        return response()->json($restaurant->delete(),202);
    }
}
