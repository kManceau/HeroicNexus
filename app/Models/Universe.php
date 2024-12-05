<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faction;

class Universe extends Model
{
    use HasFactory;
    protected $table = 'universe';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function faction(){
        return $this->hasMany(Faction::class);
    }
}
