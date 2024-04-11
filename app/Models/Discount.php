<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $code
 */
class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'user_id',
        'expired_at',
        'code'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
