<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainers extends Model
{
    use HasFactory;

    
    protected $table = 'trainers';

   
    protected $primaryKey = 'trainer_id'; 

    
    protected $fillable = [
        'gym_id',         
        'trainer_name',   
        'no_hptrainer',   
        'foto_trainer',   
        'gender_trainer', 
    ];

   
    public function gym()
    {
        return $this->belongsTo(Gyms::class, 'gym_id', 'gym_id');
    }
}
