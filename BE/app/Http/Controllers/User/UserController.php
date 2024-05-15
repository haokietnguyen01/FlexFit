<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coach;
use App\Models\evaluate;
use App\Models\Customer;
use App\Models\intermediate;
use App\Models\history;
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

    public function getMyCoach() {
        $user = auth()->user();
        $coaches = intermediate::join('coach', "intermediate.id_coach", "=", "coach.id")
                        ->select("coach.name", "coach.DOB", "coach.phone", "coach.sex", "coach.image", 
                                "coach.degree", "intermediate.accept")
                        ->where("intermediate.id_user", $user->id)
                        ->get();
        if($coaches != "[]") {
            return response()->json([
                'data' => $coaches
            ], 200); 
        }
        return response()->json([
            'Message' => "No data to display",
        ], 400); 
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

    public function saveBody(Request $request) {
        $user = auth()->user();
        
        $data = [
            "id_user" => $user->id,
            'sex' => $request->sex,
            'age' => $request->age,
            'weight' => $request->weight,
            'height' => $request->height,
            'neck' => $request->neck,
            'chest' => $request->chest,
            'abdomen' => $request->abdomen,
            'hip' => $request->hip,
            'thigh' => $request->thigh,
            'knee' => $request->knee,
            'ankle' => $request->ankle,
            'biceps' => $request->biceps,
            'forearm' => $request->forearm,
            'wrist' => $request->wrist,
            'bodyfat' => $request->bodyfat,
        ];
        if(history::create($data)) {
            return response()->json([
                'Message' => "Saved your body",
            ], 200);
        }
        return response()->json([
            'Message' => "Fail to save body",
        ], 400);
    }
    public function getBodyCustomer(){
        $user = auth()->user();
        $customer = Customer::join('history', "history.id_user", "=", "customer.id_user")
        ->select("customer.name", "customer.DOB", "customer.phone", "customer.sex", "customer.image",
                "history.age", "history.weight", "history.height", "history.neck", "history.chest",
                "history.abdomen", "history.hip", "history.thigh", "history.knee", "history.ankle",
                "history.biceps", "history.forearm", "history.wrist", "history.bodyfat")
        ->where("history.id_user", $user->id)
        ->orderBy("history.created_at", "desc")
        ->take(1)
        ->get();
        return response()->json(['customer'=>$customer]);
    }

    public function getHistory() {
        $user = auth()->user();
        $body = history::where('id_user', $user->id)->get();
        return response()->json([
            'Message' => "Get data successfully",
            'data' => $body,
        ], 200);
    }

    
}
