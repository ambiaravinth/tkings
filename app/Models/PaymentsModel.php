<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentsModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'amount',
        'pay_time',
        'prof',
        'status'
    ];
}
