<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class SimulatedPayment extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'simulated_payments';


    protected $fillable = [
        'payer_id',
        'paid_id',
        'paid_task_id',
        'amount_paid'
    ];


    public function paidto(){
       return $this->belongsTo('ChoreWeasel\User', 'paid_id');
    }

    public function paidby(){
       return $this->belongsTo('ChoreWeasel\User', 'payer_id');
    }

    public function paidtask(){
       return $this->belongsTo('ChoreWeasel\Models\AssignedTask', 'paid_task_id');
    }
}
