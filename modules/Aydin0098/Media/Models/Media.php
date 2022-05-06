<?php

namespace Aydin0098\Media\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'files' => 'json'
    ];
//    const TYPE_FREE = 'free';
//    const TYPE_CASH = 'cash';
//    static $types = [self::TYPE_FREE, self::TYPE_CASH];
//
//    const STATUS_COMPLETED = 'completed';
//    const STATUS_NOT_COMPLETED = 'not-completed';
//    const STATUS_LOCKED = 'locked';
//    static $statuses = [self::STATUS_COMPLETED, self::STATUS_NOT_COMPLETED, self::STATUS_LOCKED];
}
