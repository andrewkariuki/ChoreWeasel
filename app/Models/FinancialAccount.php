<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialAccount extends Model
{
    //

    protected $fillable = [
        'user_id',
        'balance',
    ];

    public function user(){
        return $this->belongsTo('ChoreWeasel\User', 'user_id');
    }
}
