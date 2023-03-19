<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Preset;

class PresetSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preset = Preset::create([
            'name' => 'Avocado-Schoko-Smoothie',
            'user_id' => null,
            'bottle_id' => 2,
        ]);

        $ingredients = [
            ['id' => 35, 'quantity' => 1],
            ['id' => 18, 'quantity' => 5],
            ['id' => 1, 'quantity' => 5],
        ];

        foreach ($ingredients as $ingredient) {
            $preset->ingredients()->attach($ingredient['id'], ['quantity' => $ingredient['quantity']]);
        }

        $preset = Preset::create([
            'name' => 'Grüner Smoothie mit Rucola',
            'user_id' => null,
            'bottle_id' => 1,
        ]);

        $ingredients = [
            ['id' => 31, 'quantity' => 1],
            ['id' => 27, 'quantity' => 3],
            ['id' => 24, 'quantity' => 1],
            ['id' => 28, 'quantity' => 1],
        ];

        foreach ($ingredients as $ingredient) {
            $preset->ingredients()->attach($ingredient['id'], ['quantity' => $ingredient['quantity']]);
        }

        $preset = Preset::create([
            'name' => 'Beeren-Smoothie mit Flohsamenschalen & Kokoswasser',
            'user_id' => null,
            'bottle_id' => 3,
        ]);

        $ingredients = [
            ['id' => 34, 'quantity' => 1],
            ['id' => 4, 'quantity' => 3],
            ['id' => 7, 'quantity' => 3],
            ['id' => 13, 'quantity' => 3],
            ['id' => 14, 'quantity' => 3],
            ['id' => 17, 'quantity' => 3],
        ];

        foreach ($ingredients as $ingredient) {
            $preset->ingredients()->attach($ingredient['id'], ['quantity' => $ingredient['quantity']]);
        }
    }
}
