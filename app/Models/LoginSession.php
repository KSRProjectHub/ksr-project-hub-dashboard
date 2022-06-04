<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSession extends Model
{
    use HasFactory;

    protected $table = 'login_sessions';

    protected $fillable = [
        'user_id', 
        'email', 
        'last_login_ip', 
        'updated_at'
    ];

    /**
     * Get the user that owns the LoginSession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
