<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepie extends Model
{
    use HasFactory;

    protected $table= 'recepies';
    protected $primaryKey = 'id';
    protected $fillable = ['admin_id', 'body', 'title', 'ingredients', 'image', 'taste','speed', 'price'];

    public function admin()
    {
        return $this-> belongsTo(Admin::class);
    }
    public function recepieEdited()
    {
        return $this-> hasMany(recepieEdited::class);
    }
}
