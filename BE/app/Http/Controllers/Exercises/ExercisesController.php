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
    public function searchByName(Request $request)
    {
        $name = $request->input('name');
        
        // Kiểm tra nếu không có tên được cung cấp
        if (!$name) {
            return response()->json(['error' => 'Name not provided'], 400);
        }

        // Tìm kiếm các bài tập với tên chứa $name
        $exercises = Exercises::where('name', 'like', "%$name%")->get();

        return response()->json($exercises);
    }
    
}
