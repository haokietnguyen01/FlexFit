<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = Meal::all();

        return response()->json($meals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Carb' => 'required|numeric',
            'Fiber' => 'required|numeric',
            'Protein' => 'required|numeric',
            'Calo_kcal' => 'required|numeric',
            'Meals_type' => 'required|string|max:255',
        ]);

        $meal = Meals::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Món ăn đã được thêm thành công',
            'data' => $meal,
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
