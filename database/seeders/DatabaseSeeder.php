<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Akun\RoleSeeder;
use Database\Seeders\Akun\UserSeeder;
use Database\Seeders\Master\DataProdukSeeder;
use Database\Seeders\Master\DetailMakeupSeeder;
use Database\Seeders\Master\MakeUpSeeder;
use Database\Seeders\Master\TypeMakeupSeeder;
use Database\Seeders\ManageContentSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(DataProdukSeeder::class);
        $this->call(TypeMakeupSeeder::class);
        $this->call(MakeUpSeeder::class);
        $this->call(DetailMakeupSeeder::class);
        $this->call(ManageContentSeeder::class);
    }
}
