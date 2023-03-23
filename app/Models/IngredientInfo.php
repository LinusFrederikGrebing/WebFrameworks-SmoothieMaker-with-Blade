<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientInfo extends Model
{
    use HasFactory;
    protected $table = 'ingredient_infos';
    protected $fillable = ['info', 'ingrediente_id', 'energie', 'fett', 'fattyacids', 'carbohydrates', 'fruitscarbohydrates', 'protein', 'salt'];
    public $timestamps = false;
    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
}
