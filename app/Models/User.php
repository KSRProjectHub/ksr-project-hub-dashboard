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
        'title',
        'fname',
        'lname',
        'fullname',
        'address',
        'email',
        'dob',
        'gender',
        'nic',
        'marital_status',
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

    public function userPermissions()
    {
        return $this->hasOne(UserPermission::class);
    }    

    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }

    /**
     * Get all of the User Details for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userDetails()
    {
        return $this->hasMany(UserDetails::class);
    }

    public function getUserType(){
      return  UserType::find($this->role_id)->userType;
    }

    public function profileImage(){
        return $this->profileimage;
    }

    /**
     * Get the topics added by user.
     */
    public function topic()
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * Get the project category added by user.
     */
    public function projCategory()
    {
        return $this->hasMany(ProjCategory::class);
    }

    /**
     * Get all of the terms for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function terms()
    {
        return $this->hasMany(Terms::class);
    }
}
