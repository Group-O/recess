<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    
    
    public function products(){
        return $this->hasOne(Product::class);
    }
    public function booking(){
        return $this->hasMany(Booking::class);
    }

    protected $fillable = [
        'name',
        'points',
    ];
}
