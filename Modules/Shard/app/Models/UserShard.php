<?php

declare(strict_types=1);

namespace Modules\Shard\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Shard\Database\Factories\UserShardFactory;

final class UserShard extends Model
{
    public $incrementing = false;

    // If you have timestamps
    public $timestamps = false;

    // If you treat email as the PK
    protected $primaryKey = 'email';

    // If your PK isn’t an integer
    protected $keyType = 'string';

    // Fillable fields
    protected $fillable = ['email', 'user_id', 'shard_id'];
}
