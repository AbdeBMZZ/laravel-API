<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quartier extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'location_lat',
        'location_lng',
    ];

    public function users(){
        return $this->belongsToMany(
            User::class,
            'joins');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
