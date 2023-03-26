<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'image', 'price', 'type'];
    
    // no database entries such as created_at or updated_at are required
    public $timestamps = false;

    // Define a many-to-many relationship between the current model and Preset model,
    public function presets()
    {
        // using the intermediate table 'preset_ingredients'.
        // The 'amount' attribute is included in the pivot table.
        return $this->belongsToMany(Preset::class, 'preset_ingredients')
                    ->withPivot('amount');
    }
}
