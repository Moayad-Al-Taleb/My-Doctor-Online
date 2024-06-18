<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionalFactFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'type',
        'nutritional_fact_id',
    ];

    public function nutritionalFact()
    {
        return $this->belongsTo(NutritionalFact::class);
    }

}
