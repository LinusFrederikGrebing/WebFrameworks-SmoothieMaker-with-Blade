<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IngredienteSeed::class);    
        $this->call(BottleSizeSeed::class);    
        $this->call(UserSeed::class);    
        $this->call(PresetSeed::class);    
    }
}
