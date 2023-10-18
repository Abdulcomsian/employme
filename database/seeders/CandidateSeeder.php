<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CandidatePersonalDetails;
use App\Models\CandidateEducation;
use App\Models\CandidatePreferences;
use Illuminate\Support\Facades\Hash;
class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidate = User::create([
            'name'=>'candidate',
            'email'=>'candidate@gmail.com',
            'password'=>Hash::make('candidate123'),
            'email_verified_at'=>date('Y-m-d H:i:s')
        ]);
        $candidate->assignRole('candidate');
        CandidatePersonalDetails::create(['user_id'=>$candidate->id]);
        CandidateEducation::create(['user_id'=>$candidate->id]);
        CandidatePreferences::create(['user_id'=>$candidate->id]);
    }
}
