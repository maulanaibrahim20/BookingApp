<?php

namespace App\Models\Client;

use App\Models\Akun\Customer;
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
}
