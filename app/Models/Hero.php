<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Weapon;
use App\Models\Faction;

class Hero extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function weapon(){
        return $this->belongsToMany(Weapon::class);
    }

    public function faction(){
        return $this->belongsTo(Faction::class);
    }
}
