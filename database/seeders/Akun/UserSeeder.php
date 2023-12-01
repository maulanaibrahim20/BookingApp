<?php

namespace Database\Seeders\Akun;

use App\Models\Akun\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt("password"),
            'alamat' => 'indramayu',
            'role_id' => '1',
            'no_telp' => '089167489126',
        ]);
        User::create([
            'name' => 'mua',
            'username' => 'mua',
            'email' => 'mua@example.com',
            'password' => bcrypt("password"),
            'alamat' => 'lohbener',
            'role_id' => '2',
            'no_telp' => '0891674112126',
        ]);
        $user = User::create([
            'name' => 'client',
            'username' => 'client',
            'email' => 'client@example.com',
            'password' => bcrypt("password"),
            'alamat' => 'anjatan',
            'role_id' => '3',
            'no_telp' => '089167489126',
        ]);

        Customer::create([
            "id_customer" => "CUST-" . date("YmdHis"),
            "user_id" => $user->id,
            "pekerjaan" => "Mahasiswa",
        ]);
    }
}
