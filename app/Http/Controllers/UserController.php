<?php

namespace App\Http\Controllers;

use App\Models\User; // Import lớp User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import Hash để mã hóa mật khẩu

class UserController extends Controller
{
    /**
     * Hiển thị form để nhập dữ liệu.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('create'); // Trả về view create.blade.php
    }

    /**
     * Lưu dữ liệu người dùng vào cơ sở dữ liệu.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8', // Xác thực password tối thiểu 8 ký tự
        ]);

        // Tạo bản ghi mới trong bảng users
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
        ]);

        // Trả về phản hồi JSON khi thành công
        return response()->json(['message' => 'User created successfully!'], 201);
    }
}
