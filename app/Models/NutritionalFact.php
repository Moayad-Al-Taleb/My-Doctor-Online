<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class NutritionalFact extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'fact',
        'description',
        'status',
        'health_category_id',
        'illness_id',
        'doctor_id',
    ];

    public $translatedAttributes = ['fact', 'description'];

    public function healthCategory()
    {
        return $this->belongsTo(HealthCategory::class, 'health_category_id');
    }
    public function illness()
    {
        return $this->belongsTo(Illness::class, 'illness_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function nutritionalFactFiles()
    {
        return $this->hasMany(NutritionalFactFile::class);
    }
}
