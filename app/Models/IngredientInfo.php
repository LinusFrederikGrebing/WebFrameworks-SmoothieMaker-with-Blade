<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientInfo extends Model
{
    use HasFactory;
    // This line defines the name of the database table that is associated with this model. 
    // By default, Laravel assumes that the table name is the plural form of the model's name. However, in this case, the table name is different from the default naming convention, so we need to explicitly specify the table name using this line of code. Here, the table name for this model is set to 'ingredient_infos'.
    protected $table = 'ingredient_infos';
    protected $fillable = ['info', 'ingredient_id', 'energie', 'fett', 'fattyacids', 'carbohydrates', 'fruitscarbohydrates', 'protein', 'salt'];
    public $timestamps = false;

    // This method establishes a "belongsTo" relationship between the current model and the Ingredient model.
    // It specifies that the current model "belongs to" a single Ingredient, and sets up the appropriate foreign key
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
