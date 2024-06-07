<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\SUpport\Facades\DB;
use Faker\Factory as Faker;

class KantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // for ($i = 1; $i < 20; $i++) {
        //     DB::table('kantor')->insert([
        //         'kode_kantor' => 'KAA' . $i,
        //         'nama_unit' => $faker->words(2, true),
        //         'lokasi_unit' => 'lantai ' . $i,
        //         'nomor_ruangan' => $i
        //     ]);
        // }
    }
}
