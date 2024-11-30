<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kuota;

class KuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data ke tabel kuota
        Kuota::create([
            'Kuota_kelas' => 30,  // Misalnya, nilai kuota adalah 30
        ]);

        Kuota::create([
            'Kuota_kelas' => 40,  // Kuota lainnya
        ]);

        Kuota::create([
            'Kuota_kelas' => 50,  // Kuota lainnya
        ]);

        Kuota::create([
            'Kuota_kelas' => 60,  // Kuota lainnya
        ]);

        Kuota::create([
            'Kuota_kelas' => 70,  // Kuota lainnya
        ]);
    }
};