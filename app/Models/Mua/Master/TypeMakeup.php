<?php

namespace App\Models\Mua\Master;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMakeup extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $table = 'type_makeup';

    public function getType()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
