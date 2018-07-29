<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';


    /**
     *
     * Fillable Fields for a User's Profile
     *
     * @var array
     */
    protected $fillable = [
        'task_category_id',
        'pitch',
        'rates',
        'county',
        'city',
        'locality',
        'postaladdress',
        'postalcode',
        'phonenumber',
        'nationalid',
        'dateofbirth',
        'avatar',
        'avatar_status',
    ];

    /**
     * A profile belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('ChoreWeasel\User');
    }

    /***
     * A profile has got one Task Category
     *
     * A user can only have one task category
     *
     * @return mixed
     */
    public function taskcategory()
    {
        return $this->belongsTo('ChoreWeasel\Models\TaskCategory', 'task_category_id');
    }

    public function ratings(){
        return $this->hasMany('ChoreWeasel\Models\Rating', 'profile_id');
    }

    public function assignedtask(){
        return $this->hasMany('ChoreWeasel\Models\AssignedTask' ,'tasker_profile_id');
    }
}
