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

    public const IS_ADMIN = 1;
    public const IS_EDITOR = 2;
    public const IS_USER = 3;

    public function users(){
        return $this->belongsTo(User::class);
    }
}
