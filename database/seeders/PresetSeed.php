<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preset;
use App\Models\Ingredient;

class PresetSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPreset(
            'Avocado-Schoko-Smoothie', 2,
            [
                ['id' => 35, 'quantity' => 1],
                ['id' => 18, 'quantity' => 5],
                ['id' => 1, 'quantity' => 5],
            ]
        );

        $this->createPreset(
            'Grüner Smoothie mit Rucola', 1,
            [
                ['id' => 31, 'quantity' => 1],
                ['id' => 27, 'quantity' => 3],
                ['id' => 24, 'quantity' => 1],
                ['id' => 28, 'quantity' => 1],
            ]
        );

        $this->createPreset(
            'Beeren-Smoothie mit Flohsamenschalen & Kokoswasser', 3,
            [
                ['id' => 34, 'quantity' => 1],
                ['id' => 4, 'quantity' => 3],
                ['id' => 7, 'quantity' => 3],
                ['id' => 13, 'quantity' => 3],
                ['id' => 14, 'quantity' => 3],
                ['id' => 17, 'quantity' => 3],
            ]
        );
    }

    private function createPreset(string $name, int $bottle_id, array $ingredients)
    {
        // creates a new Preset model in the database with the given name, Bottle ID, and user ID (null).
        $preset = Preset::create([
            'name' => $name,
            'user_id' => null,
            'bottle_id' => $bottle_id,
        ]);
        // This loop attaches ingredients to the newly-created Preset model.
        foreach ($ingredients as $ingredient) {
            $preset->ingredients()->attach(
                Ingredient::find($ingredient['id']),
                ['quantity' => $ingredient['quantity']]
            );
        }
    }
}