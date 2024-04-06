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
            // Prompt the user to choose a parent
            // For simplicity, let's assume the first parent is chosen
            $chosenParent = $existingParents->first();

            \App\Models\Child::create([
                'parent_id' => $chosenParent->id,
            ]);
        } else {
            // Log a message or handle the scenario accordingly if no existing parents are found
            \Illuminate\Support\Facades\Log::info('No existing parents found in the database.');
        }
    }
}


