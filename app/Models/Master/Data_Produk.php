<?php

namespace App\Models\Master;

use App\Models\Admin\Management\ManagementContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Produk extends Model
{
    use HasFactory;

    protected $table = 'data_produk';

    protected $guarded = [''];

    public function managementContent()
    {
        return $this->hasOne(ManagementContent::class, 'id_produk');
    }
}
