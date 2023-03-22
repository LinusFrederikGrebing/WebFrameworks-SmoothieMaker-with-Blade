<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientInfo extends Model
{
    use HasFactory;
    protected $table = 'ingredient_infos';
    protected $fillable = ['info', 'ingrediente_id', 'energie', 'fett', 'fatty-acids', 'carbohydrates', 'fruits-carbohydrates', 'protein', 'salt'];
    public $timestamps = false;
    public function ingrediente()
    {
        return $this->belongsTo(Ingrediente::class);
    }
}
