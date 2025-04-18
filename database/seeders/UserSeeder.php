<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'ats.cargo@example.com'],
            [
                'name' => 'ATS Cargo',
                'username' => 'ats-cargo',
                'password' => Hash::make('ATSCargo@2025'),
                'email_verified_at' => now()
            ]
        );
    }
}
