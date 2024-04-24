<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\intermediate;
use App\Models\Meals;
use App\Models\Type_Meal;



class CoachController extends Controller
{
    public function getListMeal() {
        $coach = auth()->user();

        $list = Type_Meal::join("Meals", "Meals.id_type_meal", "Type_Meal.id")
                    ->select("Meals.name", "Meals.carb", "Meals.fiber", "Meals.protein", "Meals.Calo_kcal", "Type_Meal.nameType")
                    ->orderBy("Meals.id", "ASC")
                    ->get();
        // $list = [];
        return response()->json([
            'data' => $list,
        ], 200);
    }    
}
