<?php

namespace Amaia\Base\Models;

use Database\Factories\NoteFactory;
use Amaia\Base\Casts\Tag;
use Amaia\Base\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "APP_notes";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'created_by',
        'active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'tags' => Tag::class
    ];

    protected static function newFactory()
    {
        return NoteFactory::new();
    }

    /**
     * Relationships
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scopes
     */
}
