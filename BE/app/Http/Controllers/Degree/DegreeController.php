<?php

namespace App\Http\Controllers\Degree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Degree;
use Illuminate\Support\Facades\Auth;
use App\Models\Coach;
use App\Models\User;
use App\Models\Customer;
// use App\Models\Degree;

class DegreeController extends Controller
{
    // public function storeTemporaryDegree(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'degree_image' => 'required|file|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'message' => 'Invalid input.',
    //             'errors' => $validator->errors()->toArray(),
    //         ], 400);
    //     }
    //     if (!Auth::check()) {
    //         return response()->json([
    //             'message' => 'Unauthorized',
    //         ], 401);
    //     }

    //     $user = Auth::user();
    //     $customerId = $user->id; // Assuming user is linked to customer

    //     // Update degree information
    //     $degree = Degree::where('customer_id', $customerId)->first();
    //     if (!$degree) {
    //         $degree = new Degree();
    //         $degree->customer_id = $customerId;
    //     }
    //     $degree->update($request->except( 'degree_image'));
    //     if ($request->hasFile('degree')) {
    //         $degreeImage = $request->file('degree');
            
    //             $imageName = $degreeImage->getClientOriginalName(); // Tên gốc của hình ảnh
    //             $image->move(public_path('degreeImage'), $imageName); // Di chuyển hình ảnh vào thư mục public/images
    
    //             // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
    //             $degree->degree = '/degreeImage/' . $imageName;
    //             $degree->save();

            
    //     }
        
    //     return response()->json([
    //         'message' => 'Degree and profile updated successfully.',
    //         'user' => $user,
    //         'degree' => $degree,
    //     ]);
    // }
    public function storeTemporaryDegree(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'degree_image' => 'required|file|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Invalid input.',
            'errors' => $validator->errors()->toArray(),
        ], 400);
    }
    if (!Auth::check()) {
        return response()->json([
            'message' => 'Unauthorized',
        ], 401);
    }

    $user = Auth::user();
    $customerId = $user->id; // Assuming user is linked to customer
    // dd($customerId);
    // Update degree information
    $degree = Degree::where('id_customer', $customerId)->first();
    if (!$degree) {
        $degree = new Degree();
        $degree->id_customer = $customerId;
    }
    $degree->update($request->except('degree_image'));
    $degree->status = 'Waiting';
    if ($request->hasFile('degree_image')) {
        $degreeImage = $request->file('degree_image');
        $imageName = $degreeImage->getClientOriginalName(); // Tên gốc của hình ảnh
        $degreeImage->move(public_path('degreeImage'), $imageName); // Di chuyển hình ảnh vào thư mục public/images

        // Cập nhật đường dẫn hình ảnh trong cơ sở dữ liệu
        $degree->degree_image  = '/degreeImage/' . $imageName;
        $degree->save();
    }
    
    return response()->json([
        'message' => 'Degree and profile updated successfully.',
        'user' => $user,
        'degree' => $degree,
    ]);
    // sau khi thực hiện xong thì id_user có đổi không
    }
    public function changeStatus(Request $request)
    {
        // Đổi status của Degree thành 'active'
        $degree = Degree::find($request->degree_id);
        //  dd($degree);
        $degree->status = 'Processed';
        $degree->save();
        
        // Đổi id của User thành 2
        $user = User::find($request->user_id);
        // dd($user);
        $user->role_id = 2;
        $user->save();

        $customer = Customer::find($request->user_id);
        // dd($customer);
        // Thêm dữ liệu từ bảng User vào bảng Coach
        $coach = new Coach;
        $coach->name = $customer->name; // hoặc các trường khác mà bạn muốn chuyển
        $coach->DOB = $customer->phone;
        $coach->sex = $customer->sex;
        $coach->id_payment = null;
        $coach->id_schedule = null;
        $coach->degree = $degree->degree_image;
        // if ($customer->degree) {
        //     // Đường dẫn của hình ảnh trong bảng Customer
        //     $CustomerDegreeImagePath = public_path($customer->image);
        
        //     // Kiểm tra xem hình ảnh có tồn tại không
        //     if (file_exists($customerImagePath)) {
        //         // Tạo tên mới cho hình ảnh trong bảng Coach
        //         $newImageName = 'degree_' . time() . '.' . pathinfo($customerImagePath, PATHINFO_EXTENSION);
        
        //         // Di chuyển và lưu hình ảnh vào thư mục của bảng Coach
        //         $newImagePath = public_path('coachImages/' . $newImageName);
        //         copy($customerImagePath, $newImagePath);
        
        //         // Gán đường dẫn mới vào trường image của bảng Coach
        //         $coach->image = '/coachImages/' . $newImageName;
        //     }
        // }
        if ($customer->image) {
            // Đường dẫn của hình ảnh trong bảng Customer
            $CustomerImagePath = public_path($customer->image);
        
            // Kiểm tra xem hình ảnh có tồn tại không
            if (file_exists($CustomerImagePath)) {
                // Tạo tên mới cho hình ảnh trong bảng Coach
                $newImageName = 'coach_' . time() . '.' . pathinfo($CustomerImagePath, PATHINFO_EXTENSION);
        
                // Di chuyển và lưu hình ảnh vào thư mục của bảng Coach
                $newImagePath = public_path('coachImages/' . $newImageName);
                copy($CustomerImagePath, $newImagePath);
        
                // Gán đường dẫn mới vào trường image của bảng Coach
                $coach->image = '/coachImages/' . $newImageName;
            }
        }
        // Sao chép các trường khác cần thiết từ bảng User sang bảng Coach
        $coach->save();

        // Xóa dữ liệu từ bảng Customer tương ứng với id_user
        Customer::where('user_id', $request->user_id)->delete();

        return response()->json(['message' => 'Thành công'], 200);
    }

}
