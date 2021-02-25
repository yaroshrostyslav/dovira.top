<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'name', 'login', 'link', 'email', 'password',
        'name', 'login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function notice($data){

        $data = [
            'name' => $data['name'],
            'login' => $data['login'],
            'email' => $data['email'],
            //'link' => $data['link']
        ];

        Mail::send(['html' => 'mailNotice'], $data, function ($message) {
            $message->to('info@dovira.top', 'Admin')->subject("Новий користувач");
            $message->from('info@dovira.top', 'Dovira.top');
        });
    }
}
