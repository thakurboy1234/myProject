<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Model implements Authenticatable
{
    use HasFactory,AuthenticableTrait;

    protected $table = 'admins';

    protected $fillable = [
        'First_name',
        'Last_name',
        'email',
        'password'
    ];
}
