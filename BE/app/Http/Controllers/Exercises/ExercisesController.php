<?php

namespace App\Http\Controllers\Exercises;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Type_Ex;
use App\Models\Exercises;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ExercisesController extends Controller
{
    public function index()
    {
        $exercises = Exercises::all();

        return response()->json($exercises);
    }
    public function create(Request $request)
    {
        $data= $request->all();
        if($data){
            Exercises::create($data);
            return response()->json([
                'success' => true,
                'message' => 'bài tập đã được thêm thành công',
                'data' => $data,
            ], 200);
        }
        return response()->json(['error' => 'create failed'], 400);
    }
}
