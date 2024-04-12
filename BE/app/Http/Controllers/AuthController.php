<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Coach;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;
use Hash;

class AuthController extends Controller
{
    
    public function login(Request $request){
    	
         // Lấy thông tin đăng nhập từ yêu cầu
         $credentials = $request->only('email', 'password');

        // Check email existence (assuming you have a User model)
        if (!User::where('email', $request->email)->exists()) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        // Check password using Laravel's Hash facade
        if (!Hash::check($request->password, User::where('email', $request->email)->first()->password)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        // Attempt login using Laravel's Auth facade
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        // Generate JWT token on successful login (assuming JWT middleware)
        $token = JWTAuth::fromUser(Auth::user());

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => Auth::user() // Include user details if needed
        ]);
    }
    public function register(Request $request) {
        
        $user = User::create([
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => bcrypt($request->password)
            
        ]);
        // dd($user);
        if ($user) {
            switch ($user->role_id) {
                case 1: // Customer
                    Customer::create([
                        'id_user'=>$user->id,
                        // 'email' => $user->email,
                        // 'password' => bcrypt($user->password)
                        
                    ]);
                    break;
                case 2: // Coach
                    Coach::create([
                        'id_user'=>$user->id,
                        // 'email' => $user->email,
                        // 'password' => bcrypt($user->password)
                        
                    ]);
                    break;
                default:
                    
                    break;
            }
            return response()->json(['message' => 'User registered successfully', 'user' => $user]);
        }

        return response()->json(['error' => 'Registration failed'], 500);
    }
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    public function userProfile() {
        return response()->json([auth()->user()]);
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
            'new_password' => 'required|string|min:6',
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