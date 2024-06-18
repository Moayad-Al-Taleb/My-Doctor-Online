<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
        'doctor_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(DoctorImage::class);
    }


}
