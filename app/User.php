<?php

namespace App;

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
        'name', 'email', 'password', 'profile_id', 'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function documents(){
        return $this->hasMany(Document::class);
    }

    public function receptions(){
        return $this->hasMany(Reception::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
