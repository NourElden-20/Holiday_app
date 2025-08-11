<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إضافة Admin ثابت
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => bcrypt('password'),
                'employee_type' => 'admin',
            ]
        );

        // إضافة 10 مستخدمين عشوائيين باستخدام الـ factory
        User::factory()->count(10)->create();
    }
}
