<?php

namespace App\Http\Controllers\Meals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type_Meal;
use App\Models\Meals;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = Meals::all();

        return response()->json($meals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255', // Customize validation rules as needed
        //     'carb' => 'required|numeric',
        //     'fiber' => 'required|numeric',
        //     'protein' => 'required|numeric',
        //     'calo_kcal' => 'required|numeric',
        //     'id_type_meal' => 'required|integer', // Adjust data type as required
        // ]);
    
        // if ($validator->fails()) {
        //     return Response::json([
        //         'success' => false,
        //         'message' => 'Lỗi xác thực dữ liệu: ' . $validator->errors()->first(), // Informative error message
        //     ], 422); // Unprocessable Entity HTTP status code
        // }
    
        // try {
        //     $meal = Meals::create($request->all());
    
        //     return Response::json([
        //         'success' => true,
        //         'message' => 'Món ăn ' . $meal->name . ' đã được thêm thành công',
        //         'data' => $meal,
        //     ], 201); // Created HTTP status code (as a new resource is created)
        // } catch (Exception $e) {
        //     // Handle potential database or other errors gracefully
        //     return Response::json([
        //         'success' => false,
        //         'message' => 'Có lỗi xảy ra khi thêm món ăn. Vui lòng thử lại.', // Generic error message
        //         'error' => $e->getMessage(), // Consider logging the actual error for debugging
        //     ], 500); // Internal Server Error HTTP status code
        // }
        // $typeMeal = Type_Meal::all();
        
        // $data['id_type_meal']=$request->id_type_meal;
        

        
        $data= $request->all();
        if($data){
            Meals::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Món ăn đã được thêm thành công',
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
        $meals = Meals::where('name', 'like', "%$name%")->get();

        return response()->json($meals);
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
