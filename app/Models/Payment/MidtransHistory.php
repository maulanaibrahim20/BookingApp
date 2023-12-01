<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidtransHistory extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $table = 'midtrans_history';
}
