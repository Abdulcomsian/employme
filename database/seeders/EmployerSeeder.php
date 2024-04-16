<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\EmployerDetails;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employer = User::create([
            'name'=>'employer',
            'email'=>'employer@gmail.com',
            'password'=>Hash::make('employer123'),
            'email_verified_at'=>date('Y-m-d H:i:s')
        ]);
        $employer->assignRole('employer');
        EmployerDetails::create(['user_id'=>$employer->id]);

    }
}
