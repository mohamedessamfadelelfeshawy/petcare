<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'doctor_id',
        'pet_name',
        'date',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\User', 'doctor_id');
    }
}
