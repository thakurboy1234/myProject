<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = [
        'user_id',
        'discription',
        'title'
    ];

    public function like(){
        return $this->hasMany(Like::class)->where('like','!=',0);
    }

    public function comment(){
        return $this->hasMany(Comment::class)->with('user');
    }
}
