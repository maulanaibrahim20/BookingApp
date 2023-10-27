<?php

namespace Database\Seeders\Master;

use App\Models\Mua\Master\Makeup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakeUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Makeup::create([
            'name' => 'Make up Reguler Hijab',
            'description' => 'include makeup and hijab do',
            'image' => ('dummy_image\img1.png'),
            'user_id' => 2,
            'price' => '250000',
        ]);
        Makeup::create([
            'name' => 'Make up Hair Do',
            'description' => 'include makeup and hijab do',
            'image' => ('dummy_image\img2.png'),
            'user_id' => 2,
            'price' => '350000',
        ]);
        Makeup::create([
            'name' => 'Engagement Make up Hijab',
            'description' => 'include makeup and hijab do',
            'image' => ('dummy_image\img1.png'),
            'user_id' => 2,
            'price' => '500000',
        ]);
        Makeup::create([
            'name' => 'Engagement Make up Hair Do',
            'description' => 'include makeup and hijab do',
            'image' => ('dummy_image\img3.png'),
            'user_id' => 2,
            'price' => '750000',
        ]);
        Makeup::create([
            'name' => 'Prawedding Make up Studio',
            'description' => 'include makeup and hijab do',
            'image' => ('dummy_image\img2.png'),
            'user_id' => 2,
            'price' => '850000',
        ]);
    }
}
