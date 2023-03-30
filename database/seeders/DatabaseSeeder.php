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
        // the below seeds can be traversed and created using the php artisan db:seed command
        $this->call(IngredientSeed::class);    
        $this->call(BottleSizeSeed::class);    
        $this->call(UserSeed::class);    
        $this->call(PresetSeed::class); 
        $this->call(IngredientInfoSeed::class);   
    }
}
