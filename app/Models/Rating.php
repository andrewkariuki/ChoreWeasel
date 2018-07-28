<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ratings';

    //
    protected $fillable = [
        'rater_id',
        'rated_id',
        'rated_task_id',
        'comment',
        'rating',
    ];

    public function task(){
        return $this->belongsTo('ChoreWeasel\Models\AssignedTask', 'rated_task_id');
    }

    public function ratedtasker(){
        return $this->belongsTo('ChoreWeasel\User', 'rated_id');
    }

    public function ratingclient(){
        return $this->belongsTo('ChoreWeasel\User', 'rater_id');
    }

    public function profile(){
        return $this->belongsTo('ChoreWeasel\Models\Profile', 'profile_id');
    }

}
