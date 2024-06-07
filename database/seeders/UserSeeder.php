<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\SUpport\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email_user' => 'admin@gmail.com',
                'nama_user' => 'Gamaliel Lexi',
                'role' => 'admin',
                'password' => bcrypt('11111111')
            ],
            [
                'email_user' => 'satpam@gmail.com',
                'nama_user' => 'Varel Krisna',
                'role' => 'satpam',
                'password' => bcrypt('22222222')
            ]
        ]);
    }
}
