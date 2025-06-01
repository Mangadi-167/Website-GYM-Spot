<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Gyms extends Model
{
    use HasFactory;

    use Sluggable;



    protected $table = 'gyms';


    protected $primaryKey = 'gym_id';


    protected $fillable = [
        'user_id',
        'gym_name',
        'price',
        'price_member',
        'rekening',
        'description',
        'no_hpowner',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'gym_name'
            ]
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function trainers()
    {
        return $this->hasMany(Trainers::class, 'gym_id', 'gym_id');
    }

    public function gymAddress()
    {
        return $this->hasOne(GymAddress::class, 'gym_id', 'gym_id');
    }

    public function fotoGym()
    {
        return $this->hasMany(FotoGym::class, 'gym_id', 'gym_id');
    }

    public function publicFacility()
    {
        return $this->hasMany(PublicFacility::class, 'gym_id', 'gym_id');
    }

    public function toolFacility()
    {
        return $this->hasMany(ToolFacility::class, 'gym_id', 'gym_id');
    }
    // Relasi ke membership
    public function memberships()
    {
        return $this->hasMany(Membership::class, 'gym_id', 'gym_id');
    }
}
