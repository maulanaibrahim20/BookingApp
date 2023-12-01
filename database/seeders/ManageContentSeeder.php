<?php

namespace Database\Seeders;

use App\Models\Admin\Management\ManagementContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ManagementContent::create([
            'id_produk' => 1,
            'id_makeup' => 1,
            'active' => 1,
        ]);
        ManagementContent::create([
            'id_produk' => 2,
            'id_makeup' => 2,
            'active' => 1,
        ]);
        ManagementContent::create([
            'id_produk' => 3,
            'id_makeup' => 3,
            'active' => 1,
        ]);
        ManagementContent::create([
            'id_makeup' => 4,
            'active' => 1,
        ]);
        ManagementContent::create([
            'id_makeup' => 5,
            'active' => 1,
        ]);
    }
}
