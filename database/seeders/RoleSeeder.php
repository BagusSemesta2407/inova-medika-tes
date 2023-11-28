<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'dokter',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'pasien',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'front_office',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'apoteker',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kasir',
            'guard_name' => 'web'
        ]);
    }
}
