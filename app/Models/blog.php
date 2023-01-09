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

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function like(){
        return $this->hasMany(Like::class)->where('like','!=',0)->with('user');
    }

    public function comment(){
        return $this->hasMany(Comment::class)->with('user')->orderBy('id','DESC');
    }

    public function deleteLike(){
        return $this->hasMany(Like::class)->delete();
    }

    public function deleteComment(){
        return $this->hasMany(Comment::class)->delete();
    }
}
