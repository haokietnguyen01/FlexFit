<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    use HasFactory;
    protected $table='meals';
    public $timestamps = true;
    protected $fillable = [
        'Name',
        'Carb',
        'Fiber',
        'Protein',
        'Calo_kcal',
        'Meal_type'
    ];
}
