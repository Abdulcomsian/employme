<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('plans')->truncate();

        $plans = [
            [
                'name' => 'Basic', 
                'slug' => 'basic', 
                'stripe_plan' => 'price_1OtpYNEgIRH0mqHupTyNMEk2', 
                'price' => 300000, 
                'description' => '',
                'duration' => 1
            ],
            [
                'name' => 'Premium', 
                'slug' => 'premium', 
                'stripe_plan' => 'price_1OtpaCEgIRH0mqHu9EBohTci', 
                'price' => 810000, 
                'description' => '',
                'duration' => 3
            ],
            [
                'name' => 'Platinum', 
                'slug' => 'platinum', 
                'stripe_plan' => 'price_1OtpceEgIRH0mqHuKROR07W8', 
                'price' => 1530000, 
                'description' => '',
                'duration' => 6
            ],
            [
                'name' => 'Gold', 
                'slug' => 'gold', 
                'stripe_plan' => 'price_1OtpeXEgIRH0mqHulfFolVP8', 
                'price' => 2880000, 
                'description' => '',
                'duration' => 12
            ]
        ];
  
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
