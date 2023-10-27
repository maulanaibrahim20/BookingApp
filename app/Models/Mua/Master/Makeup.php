<?php

namespace App\Models\Mua\Master;

use App\Models\Mua\DetailMakeup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makeup extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'makeup';

    public function detailMakeup()
    {
        return $this->hasMany(DetailMakeup::class, 'id_makeup');
    }

    public function getMakeup()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
