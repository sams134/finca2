<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $withCount = ['animals'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
