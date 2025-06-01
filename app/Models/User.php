<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id'; 
    
    protected $fillable = [
        'name',
        'password',
        'role',
        'email',
        'no_hp',
        'foto',
    ];
    
    protected $hidden = [
        'password',
    ];

    public function gyms()
    {
        return $this->hasMany(Gyms::class, 'user_id', 'user_id');
    }

    public function memberships()
{
    return $this->hasMany(Membership::class, 'user_id', 'user_id');
}
    
}
