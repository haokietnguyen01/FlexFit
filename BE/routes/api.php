<?php

// use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Meals\MealsController;
use App\Http\Controllers\Meals\TypeMealsController;
use App\Http\Controllers\Exercises\TypeExercisesController;
use App\Http\Controllers\Exercises\ExercisesController;
use App\Http\Controllers\Degree\DegreeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/loadModel', [\App\Http\Controllers\Controller::class, 'loadModel']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user/profile', [AuthController::class, 'userProfile']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']); 
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/getDataCustomer', [\App\Http\Controllers\Admin\AdminController::class, 'getDataCustomer']);
    Route::get('/getDataCoach', [\App\Http\Controllers\Admin\AdminController::class, 'getDataCoach']);
    Route::post('/destroy/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'destroy']);
});
//Meals
Route::get('/meals/index', [MealsController::class, 'index']);
Route::post('/meals/create', [MealsController::class, 'create']);
//Type Meals
Route::get('/type_meal/index', [TypeMealsController::class, 'index']);
Route::post('/type_meal/create', [TypeMealsController::class, 'create']);
//Type Exercises
Route::get('/type_exercises/index', [TypeExercisesController::class, 'index']);
Route::post('/type_exercises/create', [TypeExercisesController::class, 'create']);
//Exercises
Route::get('/exercises/index', [ExercisesController::class, 'index']);
Route::post('/exercises/create', [ExercisesController::class, 'create']);
Route::get('/exercises/index', [ExercisesController::class, 'index']);
Route::post('/degree/create', [DegreeController::class, 'storeTemporaryDegree']);
Route::post('/changeStatus',[DegreeController::class, 'changeStatus']);
// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {
    
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::post('/refresh', [AuthController::class, 'refresh']);
//     Route::get('/user-profile', [AuthController::class, 'userProfile']);
//     Route::post('/change-pass', [AuthController::class, 'changePassWord']); 
//     Route::post('/update-profile', [AuthController::class, 'Update']);      
// });
// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {
//     Route::post('/index', [MealsController::class, 'index']);
//     Route::post('/create', [MealsController::class, 'create']);
        
// });