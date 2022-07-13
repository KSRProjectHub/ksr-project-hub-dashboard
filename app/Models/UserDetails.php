<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class UserDetails extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'user_details';

    protected $fillable = [
        'cust_id',
        'fname',
        'lname',
        'contactNo',
        'email',
        'noOfMmbers',
        'deadline',
        'terms_and_conditions',
        'description',
        'institute',
        'module',
        'er-diagram',
        'functionsDoc',
        'projectDoc',
        'status',
        'advanced_bank_slip',
        'final_bank_slip',
        'user_id',
    ];

    public $sortable = [
        'cust_id',
        'fname',
        'lname',
        'contactNo',
        'email',
        'noOfMmbers',
        'deadline',
        'description',
        'institute',
        'module',
        'er-diagram',
        'functionsDoc',
        'projectDoc',
        'status',
        'advanced_bank_slip',
        'final_bank_slip',
        'user_id',
    ];

    /**
     * Get the user that owns the UserDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
