<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table='admins';
    protected $primaryKey = 'id';
    protected $filable = ['email', 'password', 'username'];

    public function recepie()
    {
        return $this->hasMany(Recepie::class);
    }
    
}
