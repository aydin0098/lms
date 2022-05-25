<?php

namespace Aydin0098\Media\Models;

use Aydin0098\Media\Services\MediaFileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'files' => 'json'
    ];

    protected static function booted()
    {
        static::deleting(function ($media){
            MediaFileService::delete($media);
        });
    }
    public function getThumbAttribute()
    {
        return '/storage/'. $this->files[300];

    }
}
