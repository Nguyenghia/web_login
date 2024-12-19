<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;  // Import lớp Hash

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Thêm dữ liệu vào bảng users
        User::create([
            'name' => '',
            'email' => '',
            'password' => Hash::make(''),
        ]);
    }
}