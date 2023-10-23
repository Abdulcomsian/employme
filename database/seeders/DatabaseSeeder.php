<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(EmployerSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(PlanSeeder::class);
        // $this->call(StatesTableSeeder::class);
        // $this->call(CitiesTableChunkOneSeeder::class);
        // $this->call(CitiesTableChunkTwoSeeder::class);
        // $this->call(CitiesTableChunkThreeSeeder::class);
        // $this->call(CitiesTableChunkFourSeeder::class);
        // $this->call(CitiesTableChunkFiveSeeder::class);
    }
}
