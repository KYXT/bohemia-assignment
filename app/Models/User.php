<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * @var array
     */
    public const ROLES = [
        1   => 'User',
        2   => 'Moderator',
        3   => 'Admin'
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'nickname',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'zip',
        'login',
        'password',
        'role', // 1- user, 2- moderator, 3- admin, 4- creator
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
    
    /**
     * @return string
     */
    public function getRole(): string
    {
        return self::ROLES[$this->role];
    }
    
    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->role == 1;
    }
    
    /**
     * @return bool
     */
    public function isModerator(): bool
    {
        return $this->role == 2;
    }
    
    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role == 3;
    }
}
