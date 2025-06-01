<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    
    protected $table = 'membership';

   
    protected $fillable = [
        'user_id', 
        'gym_id', 
        'name', 
        'email', 
        'no_hp', 
        'pembayaran', 
        'status'
    ];

    
    public function member()
{
    return $this->belongsTo(User::class, 'user_id', 'user_id'); 
}


    public function gym()
    {
        return $this->belongsTo(Gyms::class, 'gym_id', 'gym_id'); 
    }
}
