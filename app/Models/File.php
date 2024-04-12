<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $path
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'slug',
        'is_active',
        'user_id',
    ];

    public function getRealPath(): string
    {
        return substr($this->path, strpos($this->path, 'storage') + strlen('storage') + 1);
    }
}
