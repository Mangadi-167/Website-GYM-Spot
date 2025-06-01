<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicFacility extends Model
{
    use HasFactory;

   
    protected $table = 'public_facilities';

    
    protected $fillable = [
        'gym_id',         
        'public_facility', 
    ];

    
    public function gym()
    {
        return $this->belongsTo(Gyms::class, 'gym_id', 'gym_id');
    }
}
