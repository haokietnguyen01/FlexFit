<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\intermediate;
use App\Models\Meals;
use App\Models\Customer;
use App\Models\Coach;
use App\Models\User;
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


    public function getRequest() {
        $coach = auth()->user();
        $getCustomer = intermediate::join("Customer", "Customer.id_user", "=", "intermediate.id_user")
        ->select("intermediate.id", "intermediate.id_coach", "intermediate.accept", "Customer.id_user", "Customer.name", "Customer.DOB", "Customer.phone", "Customer.sex")
        ->where("accept", 0)
        ->orderBy("intermediate.id", "ASC")
        ->get();

        return response()->json([
            'data' => $getCustomer,
        ]);
    }

    public function receiveRequest(Request $request, $id) {
        $coach = auth()->user();
        if(!$request->data) {
            intermediate::where("id", $id)->delete();
            return response()->json([
                'Message' => "Declined the request",
            ], 400);
        }
        else {
            // $getIdCoach = Coach::select("id")->where("id_user", $coach->id)->first();
            intermediate::where("id", $id)->update(["accept" => 1]);
            return response()->json([
                'Message' => "Accepted the request",
            ], 200);
        }
        
    } 
}
