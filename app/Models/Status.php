<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function badge_color()
    {
        return $this->belongsTo(Badge_color::class);
    }
}
