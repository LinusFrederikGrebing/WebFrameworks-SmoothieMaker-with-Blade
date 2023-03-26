<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use App\Models\IngredientInfo;
use Illuminate\Database\Seeder;

class IngredientInfoSeed extends Seeder
{
    public function run()
    {
        // Get all ingredients
        $ingredients = Ingrediente::all();

        // Create IngredientInfo entry for each ingredient and use the IngredientInfo factory for that. This generates test data, with specific application-based constraints
        foreach ($ingredients as $ingredient) {
            IngredientInfo::factory()->create([
                'ingrediente_id' => $ingredient->id,
            ]);
        }
    }
}
