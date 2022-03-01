<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recepieEdited extends Model
{
    use HasFactory;

    protected $fillable =['recepieBelongs', 'recepieUser', 'ingredients', 'Body', 'taste', 'speed', 'price', 'photo' ];

    function recepie()
    {
        return $this -> belongsTo(Recepie::class);
    }
    function user()
    {
        return $this-> belongsTo(User::class);
    }
}
