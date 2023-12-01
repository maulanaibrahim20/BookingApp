<?php

namespace App\Models\Akun;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";

    protected $guarded = [''];

    public $primaryKey = "id_customer";

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function getCustomer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
