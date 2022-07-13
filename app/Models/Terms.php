<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Terms extends Model
{
    use HasFactory;
    use Sortable;

    protected $table= 'terms';

    protected $fillable = [
        'editor',
        'title',
        'version',
        'user_id',
        'updated_by'
    ];

    public $sortable = [
        'title',
        'version',
        'user_id',
        'updated_by',
        'created_date',
        'updated_date'
    ];

    /**
     * Get the user that owns the Terms
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
