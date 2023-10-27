<?php

namespace Database\Seeders\Master;

use App\Models\Master\Data_Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Data_Produk::create([
            'name' => 'Shepora Collection',
            'description' => 'Outrageous Plump Lip Glous',
            'price' => '15000',
            'active' => true,
            'image' => ('dummy_image\bedak.jpeg'),
        ]);
        Data_Produk::create([
            'name' => 'Yoardhania Sea Salt Shampoo',
            'description' => 'Pelembap berbasis oil yang membantu memperbaiki skin barrier, menjaga elastisitas kulit serta dapat melembapkan dan menghidrasi kulit',
            'price' => '20000',
            'active' => true,
            'image' => ('dummy_image\Yoardhania.png'),
        ]);
        Data_Produk::create([
            'name' => 'Ceramide Moisture Boost Oil',
            'description' => 'Lip balm edisi terbatas yang melembapkan, mengkondisikan, dan menutrisi bibir selama 12 jam, tersedia dalam 4 warna buttery yang cantik.',
            'price' => '25000',
            'active' => true,
            'image' => ('dummy_image\oil.png'),
        ]);
    }
}
