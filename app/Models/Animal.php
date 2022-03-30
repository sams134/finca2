<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Animal extends Model
{
    use HasFactory;
    public const GENDER_MALE = 1;
    public const GENDER_FEMALE = 2;

    public const CRIOLLO = 1;
    public const COMPRADO = 2;

    protected $guarded = ['id'];

    //query scopes

    public function scopeActive($query,$active){
        if ($active)
          return $query->whereHas('status',function ($q) use ($active){
              $q->where('is_active',$active);
          });
    }
    public function scopeOwner($query,$owner)
    {
        if ($owner)
        return $query->orWhereHas('owner',function ($q) use ($owner){
            $q->orWhere('name','like','%'.$owner.'%');
        });
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function earing_color()
    {
        return $this->belongsTo(Earing_color::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable')->latest();
    }
    public function weights()
    {
        return $this->hasMany(Weight::class)->orderBy('date', 'asc');
    }
    public function mom()
    {
        return $this->belongsTo(Animal::class,'animal_id');
    }

    // crear un mutador para volver de 3 digitos el numero
    protected function number():attribute
    {
        return new Attribute(
            set: function($value){
                return str_pad($value, 4, '0', STR_PAD_LEFT);
            },
            get: function($value){
                return ltrim($value, '0');
            }
        );
    }
   
}
