<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone','email', 'city','gender','usertype','password',

    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function products(){
        return  $this->hasMany('App\Product');
    }
//    public function dvproducts(){
//        return  $this->hasMany('App\Dvroduct');
//    }
    public function dvproducts(){
        return  $this->belongsTo('App\Dvroduct');
    }
    public function orders(){
        return  $this->hasMany('App\Order');
    }
//    public static function boot() {
//        parent::boot();
//
//        static::deleting(function($user) {
//            $user->products()->delete();
//
//        });
//    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
