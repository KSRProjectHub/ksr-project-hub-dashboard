<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userType extends Model
{
    protected $table = "user_types";
    protected $fillable = [
        'userType'
    ];
}
