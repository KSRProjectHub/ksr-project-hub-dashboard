<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cache;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'fullname',
        'address',
        'email',
        'dob',
        'gender',
        'nic',
        'userType',
        'role_id',
        'contactNo',
        'password',
        'last_seen'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function loginSession()
    {
        return $this->hasOne(LoginSession::class);
    }

    public function role()
    {
        return $this->hasOne(UserType::class);
    }

    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }

    public function getUserType(){
      return  UserType::find($this->role_id)->userType;
    }

    public function profileImage(){
        return $this->profileimage;
    }

}
