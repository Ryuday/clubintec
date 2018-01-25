<?php

namespace App;

use App\Notifications\CustomResetPassword;
use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'username', 'role_id'
    ];

    protected $casts = [
        'role' => 'integer',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new CustomResetPassword($token));
    }

    public function profession()
    {
      return $this->belongsTo(Profession::class);
    }

    public function role()
    {
      return $this->belongsTo(Role::class);
    }
}
