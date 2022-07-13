<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ProjCategory extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'proj_categories';

    protected $fillable = [
        'category',
        'user_id'
    ];

    public $sortable = [
        'user_id',
        'category',
        'created_at',
        'updated_at'
    ];
        
    /**
     * Get the user that owns the Topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
