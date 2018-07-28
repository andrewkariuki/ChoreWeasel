<?php

namespace ChoreWeasel\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialAccount extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'financial_accounts';

    protected $fillable = [
        'user_id',
        'balance',
    ];

    public function user(){
        return $this->belongsTo('ChoreWeasel\User', 'user_id');
    }
}
