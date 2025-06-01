<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Session;

class LoginCheck implements Rule
{
    protected $role;

    public function __construct($role = null)
    {
        $this->role = $role;
    }

    public function passes($attribute, $value)
    {
        
        if (!Session::get('loginstatus')) {
            return false;
        }

        
        if ($this->role) {
            if (Session::get('role') !== $this->role) {
                return false; 
            }
        }

        return true; 
    }

    public function message()
    {
        
        return 'Anda harus login terlebih dahulu atau tidak memiliki akses ke halaman ini.';
    }
}
