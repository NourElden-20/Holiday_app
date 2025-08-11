<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\LeaveRequest;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء 5 يوزرات
        $users = User::factory()->count(5)->create();

        // إضافة طلبات إجازة لكل يوزر
        foreach ($users as $user) {
            LeaveRequest::factory()->count(2)->create([
                'user_id' => $user->id,
            ]);
        }

        // يوزر Admin للتجربة
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'employee_type' => 'admin',
        ]);
    }
}
