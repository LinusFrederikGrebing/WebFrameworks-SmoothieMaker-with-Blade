<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottleSize extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'amount', 'image', 'price'];

    // no database entries such as created_at or updated_at are required
    public $timestamps = false;

     // This method defines a many-to-many relationship between this model and the "Preset" model.
    public function presets()
    {
        // It specifies that the relationship is established through the "preset_ingredients" table.
        // This method returns an instance of the "BelongsToMany" class, which provides access to methods for working with the relationship.
        return $this->belongsToMany(Preset::class, 'preset_ingredients');
    }
}
