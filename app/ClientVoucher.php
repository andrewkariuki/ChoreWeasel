<?php

namespace ChoreWeasel;

use Illuminate\Database\Eloquent\Model;

class ClientVoucher extends Model
{
    //
    protected $fillable = [
        'user_id',
        'amount'
    ];

    public function user(){
        return $this->belongsTo('ChoreWeasel\User', 'user_id');
    }
}
// 192.168.46.173
// php artisan serve --host 192.168.46.173 --port 8000
