<?php

namespace ChoreWeasel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoleAndPermission;

    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'firstname', 'secondname', 'name', 'email', 'password', 'banned', 'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function profile()
    {
        return $this->hasOne('ChoreWeasel\Models\Profile');
    }

    // User Profile Setup - SHould move these to a trait or interface...

    public function profiles()
    {
        return $this->belongsToMany('ChoreWeasel\Models\Profile')->withTimestamps();
    }

    public function hasProfile($name)
    {
        foreach ($this->profiles as $profile) {
            if ($profile->name == $name) {
                return true;
            }
        }

        return false;
    }

    public function assignProfile($profile)
    {
        return $this->profiles()->attach($profile);
    }

    public function removeProfile($profile)
    {
        return $this->profiles()->detach($profile);
    }

    public function owns()
    {
        return $this->hasMany('ChoreWeasel\Models\AssignedTask', 'assigned_by');
    }

    public function assigned()
    {
        return $this->hasMany('ChoreWeasel\Models\AssignedTask', 'assigned_to');
    }

    public function ratingsbyme(){
        return $this->hasMany('ChoreWeasel\Models\Rating', 'rater_id');
    }

    public function ratingstome(){
        return $this->hasMany('ChoreWeasel\Models\Rating', 'rated_id');
    }

    public function payer(){
       return $this->hasMany('ChoreWeasel\Models\SimulatedPayment', 'payer_id');
    }

    public function payed(){
        return $this->hasMany('ChoreWeasel\Models\SimulatedPayment', 'paid_id');
     }

     public function account(){
         return $this->hasOne('ChoreWeasel\Models\FinancialAccount', 'user_id');
     }

     public function disputes(){
         return $this->hasMany('ChoreWeasel\Models\Dispute', 'raised_by');
     }

}
