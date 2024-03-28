<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;


class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $cookie = cookie('jwt', $token, config('jwt.ttl'));
        return $this->createNewToken($token)->withCookie($cookie);
    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            // 'password' => 'required|between:8,255|confirmed',
            // 'password_confirmation' => 'required|same:password',
            'password' => 'required|min:6',
            // 'password_confirmation' => 'required|between:8,255|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    public function userProfile() {
        return response()->json(auth()->user());
    }
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
    public function changePassWord(Request $request) {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6',
            'new_password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $userId = auth()->user()->id;

        $user = User::where('id', $userId)->update(
                    ['password' => bcrypt($request->new_password)]
                );

        return response()->json([
            'message' => 'User successfully changed password',
            'user' => $user,
        ], 201);
    }
    
    // public function Update(Request $request){
    //     $user = Auth::user();
         
    //     if ($user) {
    //         $user->update($request->all());
    //         return response()->json([
    //             'status'    => 1,
    //             'message'   => 'User profile changed successfully ',
    //         ]);
    //     } else {
            
    //         return response()->json([
    //             'status'    => 0,
    //             'message'   => 'User profile change Error',
    //         ]);
    //     }
    // }
    public function Update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $user = Auth::user();
         
        if ($user) {
            // Cập nhật thông tin user từ request
            $user->update($request->except('image'));
    
            // Xử lý và lưu hình ảnh nếu có
            if ($request->hasFile('image')) {
                // Lưu hình ảnh vào thư mục
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName(); // Tên gốc của hình ảnh
                $image->move(public_path('images'), $imageName); // Di chuyển hình ảnh vào thư mục public/images
    
                // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
                $user->image = '/images/' . $imageName;
                $user->save();
            }
    
            return response()->json([
                'status'    => 1,
                'message'   => 'User profile changed successfully ',
                'user'      => $user
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'User profile change Error',
            ]);
        }
    }
    
    
    
}