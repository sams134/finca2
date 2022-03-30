<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function comment_type()
    {
        return $this->belongsTo(Comment_type::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
