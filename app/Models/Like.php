<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'like',
        'user_id',
        'blog_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
