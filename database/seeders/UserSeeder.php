<?php

namespace Database\Seeders;

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
        $user = User::create([
            'name' => 'Dokter',
            'email' => 'dokter@dokter.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('dokter');

        $user = User::create([
            'name' => 'Pasien',
            'email' => 'pasien@pasien.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('pasien');

        $user = User::create([
            'name' => 'Front office',
            'email' => 'front_office@fo.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('front_office');

        $user = User::create([
            'name' => 'Apoteker',
            'email' => 'apoteker@apoteker.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('apoteker');

        // $user = User::create([
        //     'name' => 'Kasir',
        //     'email' => 'kasir@kasir.id',
        //     'password' => bcrypt('12345678'),
        // ]);

        // $user->assignRole('kasir');
    }
}
