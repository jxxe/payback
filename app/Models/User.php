<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = ['remember_token'];

    public function receipts()
    {
        return $this->hasManyThrough(Receipt::class, Envelope::class);
    }

    public function envelopes()
    {
        return $this->hasMany(Envelope::class);
    }
}
