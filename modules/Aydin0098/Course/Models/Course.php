<?php

namespace Aydin0098\Course\Models;

use Aydin0098\Media\Models\Media;
use Aydin0098\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    const TYPE_FREE = 'free';
    const TYPE_CASH = 'cash';
    static $types = [self::TYPE_FREE, self::TYPE_CASH];

    const STATUS_COMPLETED = 'completed';
    const STATUS_NOT_COMPLETED = 'not-completed';
    const STATUS_LOCKED = 'locked';
    static $statuses = [self::STATUS_COMPLETED, self::STATUS_NOT_COMPLETED, self::STATUS_LOCKED];

    public function getThumbAttribute()
    {
        return '/storage/'. $this->banner->files[300];

    }

    public function banner()
    {
        return $this->belongsTo(Media::class,'banner_id');

    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');

    }
}
