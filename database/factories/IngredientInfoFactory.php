<?php
namespace Database\Factories;

use App\Models\IngredientInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientInfoFactory extends Factory
{
    protected $model = IngredientInfo::class;

    public function definition()
    {
        $info = [
            'Mangan', 
            'Kalium', 
            'Kalzium', 
            'Magnesium', 
            'Phosphor', 
            'Eisen', 
            'B1', 
            'B2', 
            'B6', 
            'Vitamin C', 
            'Folsäure'
        ];

        $infoString = $this->faker->randomElements($info, $this->faker->numberBetween(1, count($info)));
        $infoString = implode(', ', $infoString);
        return [
            'info' => $infoString,
            'ingrediente_id' => 1,
            'energie' => $this->faker->randomFloat(1, 1300, 1500) . 'kJ / ' . $this->faker->randomFloat(1, 300, 350) . ' kcal',
            'fett' => $this->faker->randomFloat(1, 0.5, 0.9) . ' g/100g',
            'fattyacids' => $this->faker->randomFloat(1, 0, 0.2) . ' g/100g',
            'carbohydrates' => $this->faker->randomFloat(1, 70, 78) . ' g/100g',
            'fruitscarbohydrates' => $this->faker->randomFloat(1, 60, 68) . ' g/100g',
            'protein' => $this->faker->randomFloat(1, 4, 5) . ' g/100g',
            'salt' => $this->faker->randomFloat(2, 0.01, 0.03) . ' g/100g',
        ];
    }
}
