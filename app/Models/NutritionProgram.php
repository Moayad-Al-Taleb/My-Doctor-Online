<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class NutritionProgram extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'name',
        'description',
        'health_category_id',
        'illness_id',
        'doctor_id',
        'user_id',
        'start_date',
        'end_date',
    ];

    public $translatedAttributes = ['name', 'description'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function healthCategory()
    {
        return $this->belongsTo(HealthCategory::class);
    }

    public function illness()
    {
        return $this->belongsTo(Illness::class);
    }

    public function nutritionProgramMeals()
    {
        return $this->hasMany(NutritionProgramMeal::class);
    }
}
