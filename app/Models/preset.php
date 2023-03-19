<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingrediente;
use App\Models\BottleSize;

class preset extends Model
{  
    protected $fillable = ['user_id', 'bottle_id', 'name'];

    public function bottle()
    {
        return $this->belongsTo(BottleSize::class, 'bottle_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingrediente::class, 'preset_ingredients')->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
