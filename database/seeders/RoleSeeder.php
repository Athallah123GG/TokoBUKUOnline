<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'description' => 'Administrator' ,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Customer',
                'description' => 'Customer' ,
                'created_at' => now(),
                'updated_at' => now()
            ],


            // Tambahkan peran lainnya sesuai kebutuhan Anda
        ];

        DB::table('roles')->insert($roles);
    }
}
