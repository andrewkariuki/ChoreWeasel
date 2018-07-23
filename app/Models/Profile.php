<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
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
        return $this->hasOne('ChoreWeasel\Models\TaskCategory');
    }
}
