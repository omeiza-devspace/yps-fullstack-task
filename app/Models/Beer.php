<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodPairing;
use App\Models\Ingredient;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tagline', 'description', 'abv', 'ibu', 'image_url', 'food_pairing_id'];

    protected $casts = [
        'id' => 'integer',
        'abv' => 'float',
        'ibu' => 'integer',
        'food_pairing_id' => 'integer',
    ];

    protected $fillable = [
        'name', 'tagline', 'description', 'abv', 'ibu', 'food_pairing', 'image_url'
    ];

    protected $casts = [
        'food_pairing' => 'json',
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
