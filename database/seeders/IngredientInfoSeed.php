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

        // Create IngredientInfo entry for each ingredient
        foreach ($ingredients as $ingredient) {
            IngredientInfo::factory()->create([
                'ingrediente_id' => $ingredient->id,
            ]);
        }
    }
}
