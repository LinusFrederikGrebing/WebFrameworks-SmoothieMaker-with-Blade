<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingrediente;
use App\Models\BottleSize;

class preset extends Model
{  
    protected $fillable = ['user_id', 'bottle_id', 'name'];

    // establishes a relationship between the current model and the BottleSize model, where the current model belongs to a BottleSize instance based on the bottle_id attribute of the current model.
    public function bottle()
    {
        return $this->belongsTo(BottleSize::class, 'bottle_id');
    }
    // establishes a many-to-many relationship between the current model and the Ingrediente model through the preset_ingredients table. 
    // The withPivot() method specifies an additional column quantity on the pivot table, which represents the quantity of the ingredient used in the preset.
    public function ingredients()
    {
        return $this->belongsToMany(Ingrediente::class, 'preset_ingredients')->withPivot('quantity');
    }
    //establishes a relationship between the current model and the User model, where the current model belongs to a User instance based on the user_id attribute of the current model.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
