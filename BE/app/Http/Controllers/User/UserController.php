<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coach;
use App\Models\evaluate;
use App\Models\Customer;
use App\Models\intermediate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getCoach() {
        // $user = auth()->user();
        // dd($user->id);
        $coach = Coach::select('id', 'name', 'DOB', 'phone', 'sex', 'degree')->get();
        return response()->json([
            'data' => $coach,
        ], 200);
    }
    
    public function getCoachById(Request $request, $id) {
        // $user = auth()->user();
        $coach = Coach::select('id', 'name', 'DOB', 'phone', 'sex', 'degree')->where('id', $id)->get();
        return response()->json([
            'data' => $coach,
        ], 200);
    }

    public function sendRequest($id) {
        $user = auth()->user();
        $data = ["id_coach" => $id, "id_user" => $user->id];
        if(intermediate::create($data)) {
            return response()->json([
                'Message' => "Send request successlly",
            ], 200); 
        }
        else {
            return response()->json([
                'Message' => "Send request fail",
            ], 400); 
        }
    }

    public function evaluate(Request $request, $id) {
        $user = auth()->user();
        $idCustomer = Customer::select('id')->where('id_user', $user->id)->first();
        evaluate::create([
            'id_customer' => $idCustomer->id,
            'id_coach' => $id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
        return response()->json([
            'Message' => "Evaluated successfully",
            // 'data' => $idCustomer
        ], 200);
    }
}
