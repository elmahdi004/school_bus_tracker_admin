<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $existingParents = \App\Models\Parents::all();

        // Check if any existing parents exist
        if ($existingParents->count() > 0) {
            foreach ($existingParents as $parent) {
                // Create 3 children for each parent
                for ($i = 0; $i < 3; $i++) {
                    \App\Models\Child::create([
                        'parent_id' => $parent->parent_id,
                    ]);
                }
            }
        } else {
            // Log a message or handle the scenario accordingly if no existing parents are found
            \Illuminate\Support\Facades\Log::info('No existing parents found in the database.');
        }
    }
}


