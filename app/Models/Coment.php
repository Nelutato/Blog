<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;
    public function recepie()
    {
        return $this->belongsTo(Recepie::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['user_id', 'recepie_id', 'comment'];
}
