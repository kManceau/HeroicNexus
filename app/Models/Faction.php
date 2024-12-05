<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hero;
use App\Models\Universe;

class Faction extends Model
{
    use HasFactory;
    protected $table = 'faction';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function hero(){
        return $this->hasMany(Hero::class);
    }

    public function universe(){
        return $this->belongsTo(Universe::class);
    }
}
