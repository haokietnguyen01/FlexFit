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
        $owner = Auth::user();
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
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Lấy lịch trình dựa trên ID
        $schedule = Schedules::find($id);

        // Kiểm tra xem lịch trình có tồn tại và thuộc về người dùng hiện tại hay không
        if (!$schedule || $schedule->id_owner != $user->id) {
            return response()->json(['error' => 'Schedule not found or unauthorized'], 404);
        }

        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
            'describe' => 'nullable|string',
            'id_meals' => 'nullable|integer',
            'id_exercises' => 'nullable|integer',
        ]);

        // Cập nhật thông tin lịch trình
        $schedule->update($validatedData);

        // Trả về thông tin lịch trình đã được cập nhật
        return response()->json(['message' => 'Schedule updated successfully', 'schedule' => $schedule]);
    }
    public function getScheduleInDate(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'date' => 'required|date',
        ]);

        // Lấy ngày từ yêu cầu
        $date = $request->input('date');

        // Lấy danh sách các lịch trình trong ngày
        $schedules = Schedules::whereDate('date', $date)->get();

        // Trả về danh sách các lịch trình
        return response()->json(['schedules' => $schedules]);
    }
    public function getScheduleInMonth(Request $request)
    {
        
        $request->validate([
            'year' => 'required|integer',
            'month' => 'required|integer|between:1,12',
        ]);

        $year = $request->input('year');
        $month = $request->input('month');

        // Tạo một đối tượng Carbon từ năm và tháng
        $startDate = Carbon::create($year, $month, 1)->startOfMonth();
        $endDate = Carbon::create($year, $month, 1)->endOfMonth();

        // Lấy danh sách các lịch trình trong tháng
        $schedules = Schedules::whereBetween('date', [$startDate, $endDate])->get();

        return response()->json(['schedules' => $schedules]);
    }
}
