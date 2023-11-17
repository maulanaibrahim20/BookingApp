<?php

namespace App\Models\Client;

use App\Models\Akun\Customer;
use App\Models\Mua\Master\Makeup;
use App\Models\Mua\Master\TypeMakeup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = "booking";

    protected $guarded = [''];

    public $primaryKey = "id_booking";

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function getCustomer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    public function getmakeup()
    {
        return $this->belongsTo(Makeup::class, 'makeup', 'id');
    }

    public function getTypeMakeup()
    {
        return $this->belongsTo(TypeMakeup::class, 'type_makeup', 'id');
    }

    public function getUserMakeup()
    {
        return $this->belongsTo(Makeup::class, 'user_id_mua', 'user_id');
    }
}
