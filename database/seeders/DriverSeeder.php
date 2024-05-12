<?php

namespace Database\Seeders;

use App\Models\Drivers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Drivers::factory(30)->create();
    }
}
