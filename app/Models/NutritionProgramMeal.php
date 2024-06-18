<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class NutritionProgramMeal extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'nutrition_program_id',
        'meal_name',
        'description',
        'additional_notes',
        'quantity',
        'calories',
        'proteins',
        'fats',
        'carbohydrates',
        'meal_type',
        'meal_time',
    ];

    public $translatedAttributes = ['meal_name', 'description', 'additional_notes'];
}
