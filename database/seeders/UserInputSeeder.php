<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Import lớp Hash

class UserInputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nhập dữ liệu từ bàn phím
        $name = readline('Enter name: ');
        $email = readline('Enter email: ');
        $password = readline('Enter password: ');

        // Tạo bản ghi mới trong bảng users
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password), // Mã hóa mật khẩu
        ]);

        echo "User created successfully!\n";
    }
}
