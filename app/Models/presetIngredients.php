<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Ingrediente;


class presetIngredients extends Pivot
{
    protected $fillable = ['preset_id', 'ingrediente_id', 'quantity'];

    public function ingredient()
    {
        return $this->belongsTo(Ingrediente::class);
    }

    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    
}
