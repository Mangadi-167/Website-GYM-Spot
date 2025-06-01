<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolFacility extends Model
{
    use HasFactory;

    
    protected $table = 'tool_facilities';

    
    protected $fillable = [
        'gym_id',        
        'tool_facility', 
    ];

   
    public function gym()
    {
        return $this->belongsTo(Gyms::class, 'gym_id', 'gym_id');
    }
}
