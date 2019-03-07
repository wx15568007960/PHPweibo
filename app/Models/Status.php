<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'content'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($status) {
            $status->user->updateStatusCount();
        });

        static::deleted(function ($status) {
            $status->user->updateStatusCount();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
