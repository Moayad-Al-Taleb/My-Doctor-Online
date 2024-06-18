<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionProgramMealTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['meal_name', 'description', 'additional_notes'];
    public $timestamps = false;

}
