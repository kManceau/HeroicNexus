<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Weapon;

class Weapon extends Model
{
    use HasFactory;
    protected $table = 'weapon';
    public $timestamps = false;

    public function hero(){
        return $this->belongsToMany(Hero::class);
    }
}
