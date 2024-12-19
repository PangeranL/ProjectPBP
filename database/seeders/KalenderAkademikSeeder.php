<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KalenderAkademikSeeder extends Seeder
{
    public function run()
    {
        DB::table('kalender_akademik')->insert([
            [
                'nama_periode' => 'Perubahan IRS',
                'tanggal_mulai' => '2024-02-01',
                'tanggal_selesai' => '2024-02-14',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_periode' => 'Pembatalan IRS',
                'tanggal_mulai' => '2024-02-01',
                'tanggal_selesai' => '2024-02-28',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
