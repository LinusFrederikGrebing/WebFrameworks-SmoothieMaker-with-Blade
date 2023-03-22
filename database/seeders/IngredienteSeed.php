<?php

namespace Database\Seeders;

use App\Models\IngredienteType;
use Illuminate\Database\Seeder;
use App\Models\Ingrediente;

class IngredienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* FRUITS */
        Ingrediente::create([
            'name' => 'Banane',
            'price' => 0.8,
            'image' => "banana-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Kirsche',
            'price' => 0.7,
            'image' => "kirsche-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Trauben',
            'price' => 0.4,
            'image' => "traube-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Erdbeere',
            'price' => 0.8,
            'image' => "erdbeere-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Mango',
            'price' => 0.8,
            'image' => "mango-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);

        Ingrediente::create([
            'name' => 'Apfel',
            'price' => 0.4,
            'image' => "apfel-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Granatapfel',
            'price' => 0.7,
            'image' => "granatapfel-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Orange',
            'price' => 0.5,
            'image' => "orange-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Pfirsich',
            'price' => 0.5,
            'image' => "pfirsich-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Ananas',
            'price' => 0.5,
            'image' => "ananas-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Kiwi',
            'price' => 0.4,
            'image' => "kiwi-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Zitrone',
            'price' => 0.3,
            'image' => "zitrone-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Blaubeere',
            'price' => 0.7,
            'image' => "blaubeere-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Himbeere',
            'price' => 0.9,
            'image' => "himbeere-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Feige',
            'price' => 0.7,
            'image' => "feige-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Litschi',
            'price' => 1.0,
            'image' => "litschi-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Kokosnuss',
            'price' => 0.9,
            'image' => "kokosnuss-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);
        Ingrediente::create([
            'name' => 'Avocado',
            'price' => 0.4,
            'image' => "avocado-piece.png",
            'type' => IngredienteType::FRUITS,
        ]);

        /* VEGETABLES */
        Ingrediente::create([
            'name' => 'Brokkoli',
            'price' => 0.5,
            'image' => "brokkoli-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Gurke',
            'price' => 0.3,
            'image' => "gurke-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Paprika',
            'price' => 0.3,
            'image' => "paprika-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Karotte',
            'price' => 0.2,
            'image' => "karotte-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Aubergine',
            'price' => 0.6,
            'image' => "aubergine-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Grünkohl',
            'price' => 0.5,
            'image' => "grünkohl-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Kürbis',
            'price' => 0.7,
            'image' => "kürbis-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Rote Beete',
            'price' => 0.6,
            'image' => "rotebeete-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Spinat',
            'price' => 0.3,
            'image' => "spinat-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Zuccini',
            'price' => 0.6,
            'image' => "zucchini-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);
        Ingrediente::create([
            'name' => 'Tomate',
            'price' => 0.4,
            'image' => "tomate-piece.png",
            'type' => IngredienteType::VEGETABLES,
        ]);

        /* LIQUIDS */
        Ingrediente::create([
            'name' => 'Milch',
            'price' => 1.7,
            'image' => "milch.png",
            'type' => IngredienteType::LIQUID,
        ]);
        Ingrediente::create([
            'name' => 'Wasser',
            'price' => 0.2,
            'image' => "wasser.png",
            'type' => IngredienteType::LIQUID,
        ]);
        Ingrediente::create([
            'name' => 'Orangensaft',
            'price' => 2.2,
            'image' => "orangen-saft.png",
            'type' => IngredienteType::LIQUID,
        ]);
        Ingrediente::create([
            'name' => 'Tomatensaft',
            'price' => 2.2,
            'image' => "tomaten-saft.png",
            'type' => IngredienteType::LIQUID,
        ]);
        Ingrediente::create([
            'name' => 'Kokosmilch',
            'price' => 0.7,
            'image' => "kokosmilch.png",
            'type' => IngredienteType::LIQUID,
        ]);
        Ingrediente::create([
            'name' => 'Schokomilch',
            'price' => 0.6,
            'image' => "schokomilch.png",
            'type' => IngredienteType::LIQUID,
        ]);
        Ingrediente::create([
            'name' => 'Hafermilch',
            'price' => 0.4,
            'image' => "hafermilch.png",
            'type' => IngredienteType::LIQUID,
        ]);
    }
}