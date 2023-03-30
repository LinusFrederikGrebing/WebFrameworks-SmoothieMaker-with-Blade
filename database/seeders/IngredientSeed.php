<?php

namespace Database\Seeders;

use App\Models\IngredientType;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // The basic Ingredients are created hard-coded
        /* FRUITS */
        Ingredient::create([
            'name' => 'Banane',
            'price' => 0.8,
            'image' => "banana-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Kirsche',
            'price' => 0.7,
            'image' => "kirsche-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Trauben',
            'price' => 0.4,
            'image' => "traube-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Erdbeere',
            'price' => 0.8,
            'image' => "erdbeere-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Mango',
            'price' => 0.8,
            'image' => "mango-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Apfel',
            'price' => 0.4,
            'image' => "apfel-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Granatapfel',
            'price' => 0.7,
            'image' => "granatapfel-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Orange',
            'price' => 0.5,
            'image' => "orange-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Pfirsich',
            'price' => 0.5,
            'image' => "pfirsich-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Ananas',
            'price' => 0.5,
            'image' => "ananas-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Kiwi',
            'price' => 0.4,
            'image' => "kiwi-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Zitrone',
            'price' => 0.3,
            'image' => "zitrone-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Blaubeere',
            'price' => 0.7,
            'image' => "blaubeere-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Himbeere',
            'price' => 0.9,
            'image' => "himbeere-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Feige',
            'price' => 0.7,
            'image' => "feige-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Litschi',
            'price' => 1.0,
            'image' => "litschi-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Kokosnuss',
            'price' => 0.9,
            'image' => "kokosnuss-piece.png",
            'type' => IngredientType::FRUITS,
        ]);
        Ingredient::create([
            'name' => 'Avocado',
            'price' => 0.4,
            'image' => "avocado-piece.png",
            'type' => IngredientType::FRUITS,
        ]);

        /* VEGETABLES */
        Ingredient::create([
            'name' => 'Brokkoli',
            'price' => 0.5,
            'image' => "brokkoli-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Gurke',
            'price' => 0.3,
            'image' => "gurke-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Paprika',
            'price' => 0.3,
            'image' => "paprika-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Karotte',
            'price' => 0.2,
            'image' => "karotte-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Aubergine',
            'price' => 0.6,
            'image' => "aubergine-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Grünkohl',
            'price' => 0.5,
            'image' => "grünkohl-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Kürbis',
            'price' => 0.7,
            'image' => "kürbis-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Rote Beete',
            'price' => 0.6,
            'image' => "rotebeete-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Spinat',
            'price' => 0.3,
            'image' => "spinat-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Zuccini',
            'price' => 0.6,
            'image' => "zucchini-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);
        Ingredient::create([
            'name' => 'Tomate',
            'price' => 0.4,
            'image' => "tomate-piece.png",
            'type' => IngredientType::VEGETABLES,
        ]);

        /* LIQUIDS */
        Ingredient::create([
            'name' => 'Milch',
            'price' => 1.7,
            'image' => "milch.png",
            'type' => IngredientType::LIQUID,
        ]);
        Ingredient::create([
            'name' => 'Wasser',
            'price' => 0.2,
            'image' => "wasser.png",
            'type' => IngredientType::LIQUID,
        ]);
        Ingredient::create([
            'name' => 'Orangensaft',
            'price' => 2.2,
            'image' => "orangen-saft.png",
            'type' => IngredientType::LIQUID,
        ]);
        Ingredient::create([
            'name' => 'Tomatensaft',
            'price' => 2.2,
            'image' => "tomaten-saft.png",
            'type' => IngredientType::LIQUID,
        ]);
        Ingredient::create([
            'name' => 'Kokosmilch',
            'price' => 0.7,
            'image' => "kokosmilch.png",
            'type' => IngredientType::LIQUID,
        ]);
        Ingredient::create([
            'name' => 'Schokomilch',
            'price' => 0.6,
            'image' => "schokomilch.png",
            'type' => IngredientType::LIQUID,
        ]);
        Ingredient::create([
            'name' => 'Hafermilch',
            'price' => 0.4,
            'image' => "hafermilch.png",
            'type' => IngredientType::LIQUID,
        ]);
    }
}