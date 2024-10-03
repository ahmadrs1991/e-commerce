<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Add fields that can be mass assigned
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Hide password and remember_token from JSON responses
    protected $hidden = [
        'password', 'remember_token',
    ];

}
