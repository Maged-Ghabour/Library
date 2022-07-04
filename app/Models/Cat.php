<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = [
        "name"
    ];

    public function books(){
        return $this->belongsToMany("App\Models\Book");
    }

    use HasFactory;
}
