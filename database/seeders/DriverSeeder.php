<?php

namespace Database\Seeders;

use App\Models\Drivers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Vehicle;

class DriverSeeder extends Seeder
{
    public function run(): void
{
    // Retrieve all bus ids from the buses table
    $busIds = Vehicle::pluck('id')->toArray();

    // Create drivers and assign a random bus_id from the retrieved ids
    Drivers::factory(30)->create([
        'bus_id' => function () use ($busIds) {
            return $busIds[array_rand($busIds)];
        }
    ]);
}
}
