<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        "title","desc","img"
    ];

    public function cats(){
        return $this->belongsToMany("App\Models\Cat");
    }

    use HasFactory;
}
