<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Ingrediente;


class presetIngredients extends Pivot
{
    protected $fillable = ['preset_id', 'ingrediente_id', 'quantity'];

    // defines a belongs-to relationship, meaning each PresetIngredient model belongs to an Ingredient model.
    public function ingredient()
    {
        return $this->belongsTo(Ingrediente::class);
    }
    // defines a belongs-to relationship, meaning each PresetIngredient model belongs to a Preset model.
    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    
}
