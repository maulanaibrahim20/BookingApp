<?php

namespace Database\Seeders\Master;

use App\Models\Mua\Master\TypeMakeup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeMakeupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeMakeup::create([
            'name' => 'Graduation',
            'user_id' => 2,
        ]);
        TypeMakeup::create([
            'name' => 'Party',
            'user_id' => 2,
        ]);
        TypeMakeup::create([
            'name' => 'Bridesmaid',
            'user_id' => 2,
        ]);
        TypeMakeup::create([
            'name' => 'Bridesmaid',
            'user_id' => 2,
        ]);
        TypeMakeup::create([
            'name' => 'Bridesmaid',
            'user_id' => 2,
        ]);
    }
}
