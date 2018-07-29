<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'disputes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'raised_by', 'assigned_task_id', 'subject', 'complaint', 'solved'
    ];

    public function disputer(){
        return $this->belongsTo('ChoreWeasel\User', 'raised_by');
    }

    public function taskdisputed(){
        return $this->belongsTo('ChoreWeasel\Models\AssignedTask', 'assigned_task_id');
    }
}
