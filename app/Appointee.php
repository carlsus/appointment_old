<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Appointee extends Authenticatable
{
    use Notifiable;
    protected $guard = 'appointee';

    protected $guarded=[];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
