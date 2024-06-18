<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class User extends Authenticatable implements TranslatableContract
{
    use HasApiTokens, HasFactory, Notifiable;
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // *
        'email', // *
        'password', // *
        'status',
        'birth_date', // *
        'telegram_number',
        'telegram_id',
        'profile_picture',
        'id_card_picture',

        'height',
        'weight',
        'gender', // *
        'address',
        'blood_type',
        'medical_conditions',
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $translatedAttributes = [
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

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
