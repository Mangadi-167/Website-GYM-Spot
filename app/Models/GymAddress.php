<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GymAddress extends Model
{
    use HasFactory;

    
    protected $table = 'gym_address';

    
    protected $primaryKey = 'id_address';

    
    protected $fillable = [
        'gym_id', 'address', 'province', 'regency', 'subdistrict', 'link'
    ];


    public function gym()
    {
        return $this->belongsTo(Gyms::class, 'gym_id', 'gym_id');
    }
}
