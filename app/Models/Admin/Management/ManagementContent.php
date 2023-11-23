<?php

namespace App\Models\Admin\Management;

use App\Models\Master\Data_Produk;
use App\Models\Mua\Master\Makeup;
use Database\Seeders\Master\DataProdukSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagementContent extends Model
{
    use HasFactory;

    protected $table = 'management_content';

    protected $guarded = [''];

    public function getMakeup()
    {
        return $this->belongsTo(Makeup::class, 'id_makeup', 'id');
    }

    public function getProduk()
    {
        return $this->belongsTo(Data_Produk::class, 'id_produk', 'id');
    }
}
