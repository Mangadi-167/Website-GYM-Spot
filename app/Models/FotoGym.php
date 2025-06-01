<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoGym extends Model
{
    use HasFactory;

   
    protected $table = 'foto_gym';

    
    protected $primaryKey = 'id_foto';

    
    protected $fillable = [
        'gym_id',       
        'foto_gym1',    
        'foto_gym2',    
        'foto_gym3',    
    ];

    
    public function gym()
    {
        return $this->belongsTo(Gyms::class, 'gym_id', 'gym_id'); 
    }
}
