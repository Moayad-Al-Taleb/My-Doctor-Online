<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'blood_type',
        'medical_conditions',
        'allergies',
        'dietary_restrictions',
        'occupation',
        'physical_activity_level',
        'goal',
        'food_preferences',
        'chronic_diseases',
        'current_medications',
        'smoking_status',
        'alcohol_consumption',
    ];
    public $timestamps = false;
}
