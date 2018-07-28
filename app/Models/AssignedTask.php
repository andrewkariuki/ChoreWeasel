<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedTask extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assigned_tasks';

    protected $fillable = [
        'assigned_by',
        'assigned_to',
        'task_category_id',
        'city_town',
        'locality_street',
        'apartment_unit',
        'apt_unit_no',
        'task_size',
        'task_requirements',
        'task_description',
        'task_date_time',
        'rates',
        'completed',
        'completed_at',
        'total_payable',
        'hours_worked',
        'paid',
    ];

    public function assigner()
    {
        return $this->belongsTo('ChoreWeasel\User', 'assigned_by');
    }

    public function assignee()
    {
        return $this->belongsTo('ChoreWeasel\User', 'assigned_to');
    }

    public function taskcategory()
    {
        return $this->belongsTo('ChoreWeasel\Models\TaskCategory', 'task_category_id');
    }

    public function rating(){
        return $this->hasOne('ChoreWeasel\Models\Rating', 'rated_task_id');
    }

    public function payment(){
        return $this->hasOne('ChoreWeasel\Models\SimulatedPayment', 'paid_task_id');
    }

    public function dispute(){
        return $this->hasMany('ChoreWeasel\Models\Dispute', 'assigned_task_id');
    }
}
