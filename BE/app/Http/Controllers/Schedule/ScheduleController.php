<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedules;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'id_owner' => 'required',
            'name' => 'required',
            'date' => 'required|date',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
        ]);
        $owner = Auth::user();
        // dd($owner->id);
        $data = $request->all();
        $data['id_owner'] = $owner->id;
        $date = new \DateTime($data['date']);
        $data['date'] = $date->format('Y-m-d');

        // Xử lý định dạng giờ sử dụng Carbon
        $timezone = 'Asia/Ho_Chi_Minh';
        $data['time_start'] = Carbon::createFromFormat('H:i', $data['time_start'], $timezone)->format('H:i:s');
        $data['time_end'] = Carbon::createFromFormat('H:i', $data['time_end'], $timezone)->format('H:i:s');

        $schedule = Schedules::create($data);
        return response()->json([
            'message' => 'Schedule created successfully',
            'schedule' => $schedule
        ], 200);
    }
    public function delete($id)
    {
        $owner = Auth::user();
        $schedule = Schedules::where("id", $id)->where("id_owner", $owner->id)->first();
        if ($schedule) {
            $schedule->delete();

            return response()->json([
                'message' => 'Successfully delete a schedule',
            ], 200);
        }
        return response()->json([
            'error' => "The schedule field is not correct",
        ], 400);
    }
    
    public function getDataById($id)
    {
        //(GET DETAIL BY ID USER)check là check id_user, date, truyền id_owner, còn lại all

        $owner = Auth::user();
        dd($owner->id);
        $schedule = Schedules::where("id", $id)->where("id_owner", $owner->id)->first();
        if ($schedule) {
            return response()->json([
                'schedule' => $schedule
            ]);
        }
        return response()->json([
            'error' => "The Schedule field is not correct",
        ], 400);
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $schedule = Schedules::find($id);

        // Kiểm tra xem lịch trình có tồn tại và thuộc về người dùng hiện tại hay không
        if (!$schedule || $schedule->id_owner != $user->id) {
            return response()->json(['error' => 'Schedule not found or unauthorized'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
            'describe' => 'nullable|string',
            'id_meals' => 'nullable|integer',
            'id_exercises' => 'nullable|integer',
        ]);

        $schedule->update($validatedData);

        return response()->json(['message' => 'Schedule updated successfully', 'schedule' => $schedule]);
    }
    public function getScheduleInDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);
        $auth = Auth::user();
        // dd($auth);
        if($auth->role_id == 2){
            $dateRequest = new \DateTime($request->date); 
            $date = $dateRequest->format('Y-m-d');
            
            $schedules = Schedules::where('date', $date)
                          ->where('id_owner', $auth->id)
                          ->get();
            // dd($schedules);
            return response()->json(['schedules' => $schedules]);
        }else if($auth->role_id == 1){
            $dateRequest = new \DateTime($request->date); 
            $date = $dateRequest->format('Y-m-d');
            
            $schedules = Schedules::where('date', $date)
                          ->where('id_user', $auth->id)
                          ->get();
            // dd($schedules);

            return response()->json(['schedules' => $schedules]);
        }else{
            return response()->json(['message' => 'fail']);
        }
        
    }
    // public function getScheduleInMonth(Request $request)
    // {
        
    //     $request->validate([
    //         'year' => 'required|integer',
    //         'month' => 'required|integer|between:1,12',
    //     ]);

    //     $year = $request->input('year');
    //     $month = $request->input('month');

    //     // Tạo một đối tượng Carbon từ năm và tháng
    //     $startDate = Carbon::create($year, $month, 1)->startOfMonth();
    //     $endDate = Carbon::create($year, $month, 1)->endOfMonth();

    //     // Lấy danh sách các lịch trình trong tháng
    //     $schedules = Schedules::whereBetween('date', [$startDate, $endDate])->get();

    //     return response()->json(['schedules' => $schedules]);
    // }
}