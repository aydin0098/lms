<?php

namespace Aydin0098\Category\Models;

use Aydin0098\User\Notifications\ResetPasswordRequestNotification;
use Aydin0098\User\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use function PHPUnit\Framework\isNull;

class Category extends Model
{
    protected $guarded = [];

    public function getParentAttribute()
    {
        return (is_null($this->parent_id)) ? 'ندارد' : $this->parentCategory->title;

    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id');

    }

    public function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id');

    }

}
