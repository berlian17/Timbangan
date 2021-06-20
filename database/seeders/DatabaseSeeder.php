<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'rfid' => rand(100000,999999),
                'username'=>'Admin',
                'no_telp'=>'08123456789',
                'lokasi'=>'Bandung',
                'password'=>'123456789',
                'role'=>'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'rfid' => rand(100000,999999),
                'username'=>'Nasabah',
                'no_telp'=>'08987654321',
                'lokasi'=>'Jakarta',
                'password'=>'123456789',
                'role'=>'nasabah',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
