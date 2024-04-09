<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BusMaintenance;
use App\Models\Location;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use App\Models\MaintenanceType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Location::factory(50)->create();
        MaintenanceType::factory(5)->create();
        Vehicle::factory(50)->create();
        BusMaintenance::factory(150)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
