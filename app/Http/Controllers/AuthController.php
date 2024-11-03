<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'weight' => $request->weight,
            'height' => $request->height,
        ]);

        // Tạo token cho user và trả về
        $token = $user->createToken('YourAppName')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    // Đăng nhập tài khoản
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Thông tin đăng nhập không hợp lệ'], 401);
        }

        // Trả về token sau khi đăng nhập
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            // 'user_id' => $user->id, // Uncomment if you want to return user ID
            // 'user' => $user, // Uncomment to return more user information
        ]);
    }

    // Lấy thông tin người dùng đã đăng nhập
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        // Kiểm tra người dùng đã được xác thực hay chưa
        if (!$request->user()) {
            return response()->json(['error' => 'Người dùng không hợp lệ.'], 401);
        }

        // Xóa tất cả token của người dùng
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Đăng xuất thành công!']);
    }


    //Lấy thông tin profile
    public function getProfile(Request $request)
    {
        $user = Auth::user();
        return response()->json([
            'first_name' => $user->first_name,  // Sử dụng thông tin từ $user
            'last_name' => $user->last_name,
            'email' => $user->email,
            'gender' => $user->gender,
            'date_of_birth' => $user->date_of_birth,
            'weight' => $user->weight,
            'height' => $user->height,
        ]);
    }
    // Hàm cập nhật thông tin người dùng
    public function updateUserInfo(Request $request)
    {
        // Xác thực người dùng
        $user = Auth::user();
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Bạn phải đăng nhập để thực hiện chức năng này'], 401);
        }

        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ', 'errors' => $validator->errors()], 422);
        }
        // Lấy dữ liệu từ yêu cầu
        $user->gender = $request->input('gender');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->weight = $request->input('weight');
        $user->height = $request->input('height');

        // Cập nhật thông tin vào cơ sở dữ liệu
        if ($user->save()) {
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thông tin thành công', 'user' => $user], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Cập nhật thông tin thất bại'], 500);
        }
    }
}
