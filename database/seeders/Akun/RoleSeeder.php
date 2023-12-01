<?php

namespace Database\Seeders\Akun;

use App\Models\Akun\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "nama" => "admin"
        ]);
        Role::create([
            "nama" => "mua"
        ]);
        Role::create([
            "nama" => "client"
        ]);
    }
}
