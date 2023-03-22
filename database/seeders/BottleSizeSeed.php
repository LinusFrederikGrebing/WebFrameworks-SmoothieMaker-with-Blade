<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BottleSize;

class BottleSizeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BottleSize::create([
            'name' => 'S',
            'amount' => 5,
            'description' => "Die Größe S bildet sich aus bis zu 5 verschiedenen Zutaten. Bei Erhalt erwartet Sie 250ml pure Smoothie-Geschmacksexplosion. Der Preis Ihrer Zusammenstellung errechnet sich aus den Einzelpreisen der Zutaten. Viel Spaß damit!",
            'image' => "Ssize.png",
        ]);
        BottleSize::create([
            'name' => 'M',
            'amount' => 10,
            'description' => "Die Größe M bildet sich aus bis zu 10 verschiedenen Zutaten. Bei Erhalt erwartet Sie 500ml pure Smoothie-Geschmacksexplosion. Der Preis Ihrer Zusammenstellung errechnet sich aus den Einzelpreisen der Zutaten. Viel Spaß damit!",
            'image' => "Msize.png",
           
        ]);
        BottleSize::create([
            'name' => 'L',
            'amount' => 15,
            'description' => "Die Größe L bildet sich aus bis zu 15 verschiedenen Zutaten. Bei Erhalt erwartet Sie 750ml pure Smoothie-Geschmacksexplosion. Der Preis Ihrer Zusammenstellung errechnet sich aus den Einzelpreisen der Zutaten. Viel Spaß damit!",
            'image' => "Lsize.png",
        ]);
        BottleSize::create([
            'name' => 'XL',
            'amount' => 20,
            'description' => "Die Größe XL bildet sich aus bis zu 20 verschiedenen Zutaten. Bei Erhalt erwartet Sie 1000ml pure Smoothie-Geschmacksexplosion. Der Preis Ihrer Zusammenstellung errechnet sich aus den Einzelpreisen der Zutaten. Viel Spaß damit!",
            'image' => "XLsize.png",
        ]);
    }
}