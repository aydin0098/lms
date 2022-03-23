<?php

namespace Aydin0098\User\Models;

use Aydin0098\User\Notifications\ResetPasswordRequestNotification;
use Aydin0098\User\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'mobile',
        'headline',
        'bio',
        'website',
        'linkedin',
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'telegram',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {

       $this->notify(new VerifyEmailNotification());

    }
    public function sendResetPasswordRequestNotification()
    {
        $this->notify(new ResetPasswordRequestNotification());
    }
}
