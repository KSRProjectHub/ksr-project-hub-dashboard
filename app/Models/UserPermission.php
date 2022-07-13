<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $table = 'user_permissions';

    protected $fillable = [
        'role_id',
        'user_id',
        'add',
        'update',
        'delete',
    ];

    /**
     * Get the user that owns the UserPermission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userRoles(){
        return $this->belongsTo(UserType::class);
    }
}
