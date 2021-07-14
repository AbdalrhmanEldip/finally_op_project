<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'admin_name',
         'password',
         'expire',
         'active',
         'is_owner',
         'logo'
    ];


    protected $hidden = ['ptp'];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function getAuthPassword()
{
    return $this->password;
}

public function subscribers()
{
    return $this->hasMany(Subscriber::class);
}
   
}
