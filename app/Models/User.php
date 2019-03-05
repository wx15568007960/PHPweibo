<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = str_random(30);
        });
    }

    public function avatar()
    {
        if (!$this->avatar) {
            $this->makeAvatar();
        }
        
        return $this->avatar;
    }

    public function makeAvatar()
    {
        $this->avatar = make_avatar($this->email);
        $this->save();

        return $this->avatar;
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
}
