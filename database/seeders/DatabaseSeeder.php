<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\useracc;
use App\Models\roles;
use App\Models\userroles;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\bagianAkademik;
use App\Models\pembimbingAkademik;
use App\Models\dekan;
use App\Models\kaprodi;
use App\Models\prodi;
use App\Models\ruang;
use App\Models\matakuliah;
use App\Models\jadwal;
use App\Models\irs;
use App\Models\khs;
use App\Models\Kuota;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            KuotaSeeder::class
        ]);


        $userAcc = useracc::create([
            #admin
            'email' => 'adwin@adminz.undip.ac.id',
            'password' => bcrypt('Adwin1234'),
        ]);

        $userAcc = useracc::create([
            #mahasiswa
            'email' => 'ganz@students.undip.ac.id',
            'password' => bcrypt('Ganz123!'),
        ]);

        $userAcc = useracc::create([
            #dekan
            'email' => 'juliantohh@lectures.undip.ac.id',
            'password' => bcrypt('jul3X!!!'),
        ]);

        $userAcc = useracc::create([
            #kaprodi dan pembimbing akademik
            'email' => 'sidoel@lectures.undip.ac.id',
            'password' => bcrypt('siDoel98'),
        ]);

        $userAcc = useracc::create([
            #bagian akademik
            'email' => 'vtuber@lectures.undip.ac.id',
            'password' => bcrypt('akuVtuberGen2'),
        ]);
        
        $Roles = roles::create([
            'role' => 'Admin',
        ]);

        $Roles = roles::create([
            'role' => 'Mahasiswa',
        ]);

        $Roles = roles::create([
            'role' => 'Dekan',
        ]);

        $Roles = roles::create([
            'role' => 'Ketua Program Studi',
        ]);

        $Roles = roles::create([
            'role' => 'Bagian Akademik',
        ]);

        $Roles = roles::create([
            'role' => 'Pembimbing Akademik',
        ]);

        $userRoles = userroles::create([
            'email' => 'adwin@adminz.undip.ac.id',
            'role' => 'Admin',
        ]);

        $userRoles = userroles::create([
            'email' => 'ganz@students.undip.ac.id',
            'role' => 'Mahasiswa',
        ]);

        $userRoles = userroles::create([
            'email' => 'juliantohh@lectures.undip.ac.id',
            'role' => 'Dekan',
        ]);

        $userRoles = userroles::create([
            'email' => 'sidoel@lectures.undip.ac.id',
            'role' => 'Ketua Program Studi',
        ]);

        $userRoles = userroles::create([
            'email' => 'vtuber@lectures.undip.ac.id',
            'role' => 'Bagian Akademik',
        ]);

        $userRoles = userroles::create([
            'email' => 'sidoel@lectures.undip.ac.id',
            'role' => 'Pembimbing Akademik',
        ]);

        $Prodi = prodi::create([
            'nama' => 'Informatika',
        ]);

        $Prodi = prodi::create([
            'nama' => 'Bioteknologi',
        ]);


        $Dosen = dosen::create([
            'nidn' => '24060123456789',
            'name' => 'Julianto Hari Hungaria',
            'dob' => '1992-01-21',
            'phone' => '089882741100',
            'address' => 'Jl. Kembangsari No. 80',
            'prodi' => 'Informatika',
        ]);

        $Dosen = dosen::create([
            'nidn' => '24050123456789',
            'name' => 'Doel',
            'dob' => '1987-03-11',
            'phone' => '084653221990',
            'address' => 'Jl. Jabodetabek IV No. 01',
            'prodi' => 'Informatika',
        ]);

        $Dosen = dosen::create([
            'nidn' => '24010123456789',
            'name' => 'Doni',
            'dob' => '1992-01-21',
            'phone' => '089882741100',
            'address' => 'Jl. Kembangsari No. 80',
            'prodi' => 'Informatika',
        ]);

        $Dosen = dosen::create([
            'nidn' => '24020123456789',
            'name' => 'Rumi',
            'dob' => '1992-01-21',
            'phone' => '089882741100',
            'address' => 'Jl. Kembangsari No. 80',
            'prodi' => 'Informatika',
        ]);

        $Dosen = dosen::create([
            'nidn' => '24030123456789',
            'name' => 'Siti',
            'dob' => '1992-01-21',
            'phone' => '089882741100',
            'address' => 'Jl. Kembangsari No. 80',
            'prodi' => 'Informatika',
        ]);

        $Dosen = dosen::create([
            'nidn' => '24040123456789',
            'name' => 'Dina',
            'dob' => '1992-01-21',
            'phone' => '089882741100',
            'address' => 'Jl. Kembangsari No. 80',
            'prodi' => 'Informatika',
        ]);

        $Dosen = dosen::create([
            'nidn' => '22060123456789',
            'name' => 'Ronald',
            'dob' => '1992-01-21',
            'phone' => '089882741100',
            'address' => 'Jl. Kembangsari No. 80',
            'prodi' => 'Informatika',
        ]);

        $Dosen = dosen::create([
            'nidn' => '24062123456789',
            'name' => 'Inul',
            'dob' => '1992-01-21',
            'phone' => '089882741100',
            'address' => 'Jl. Kembangsari No. 80',
            'prodi' => 'Informatika',
        ]);

        $bAkdm = bagianakademik::create([
            'nidn' => '24040123456789',
            'name' => 'Zeta',
            'dob' => '2002-01-01',
            'phone' => '085445635412',
            'address' => 'Jl. Apel Hijau No. 65',
            'email' => 'vtuber@lectures.undip.ac.id',
            'fakultas' => 'Sains dan Matematika',
        ]);

        $dekan = dekan::create([
            'nidn' => '24060123456789',
            'email' => 'juliantohh@lectures.undip.ac.id',
        ]);

        $Kaprodi = kaprodi::create([
            'nidn' => '24050123456789',
            'email' => 'sidoel@lectures.undip.ac.id',
        ]);

        $pAkdm = pembimbingakademik::create([
            'nidn' => '24050123456789',
            'email' => 'sidoel@lectures.undip.ac.id',
        ]);

        $Mhs = mahasiswa::create([
            'nim' => '24160122131000',
            'name' => 'Ganz',
            'dob' => '2004-10-10',
            'phone' => '084658261533',
            'address' => 'Jl. Mulawarman Tenggara I No. 10',
            'email' => 'ganz@students.undip.ac.id',
            'nidnWali' => '24050123456789',
        ]);

        $Ruangan = ruang::create([
            'nama' => 'E101',
        ]);

        $Ruangan = ruang::create([
            'nama' => 'A303',
        ]);

        $Ruangan = ruang::create([
            'nama' => 'B102',
        ]);

        $Ruangan = ruang::create([
            'nama' => 'A101',
        ]);



        $MK = matakuliah::create([
            'kodeMK' => 'PAIK6404',
            'namaMK' => 'Pyoyek Perangkat Lunak',
            'sks' => 3,
            'semester' => 5,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK1234',
            'namaMK' => 'Teori Bahasa dan Otomata',
            'sks' => 3,
            'semester' => 7,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK3201',
            'namaMK' => 'Basis Data',
            'sks' => 4,
            'semester' => 3 ,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK3202',
            'namaMK' => 'Pemrograman Berbasis Platform',
            'sks' => 4,
            'semester' => 5,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK1021',
            'namaMK' => 'Komputasi Tersebar Paralel',
            'sks' => 3,
            'semester' => 5,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK2022',
            'namaMK' => 'Pembelajaran Mesin',
            'sks' => 3,
            'semester' => 5,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK1111',
            'namaMK' => 'Pemrograman Berorientasi Objek',
            'sks' => 3,
            'semester' => 4,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK2222',
            'namaMK' => 'Kewirausahaan',
            'sks' => 2,
            'semester' => 4,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK3333',
            'namaMK' => 'Struktur Data',
            'sks' => 4,
            'semester' => 4 ,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK4444',
            'namaMK' => 'Keamanan dan Jaringan Komputer',
            'sks' => 2,
            'semester' => 5,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK5555',
            'namaMK' => 'Olahraga',
            'sks' => 1,
            'semester' => 5,
        ]);

        $MK = matakuliah::create([
            'kodeMK' => 'PAIK6666',
            'namaMK' => 'Grafika Komputasi Visual',
            'sks' => 3,
            'semester' => 5,
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK6404',
            'nidn' => '24010123456789',
            'kelas' => 'A',
            'hari' => 'Rabu',
            'mulai' => '13.00',
            'selesai' => '15.30',
            'thnAjar'=> 'Gasal 2024/2025',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK1234',
            'nidn' => '24020123456789',
            'kelas' => 'D',
            'hari' => 'Senin',
            'mulai' => '13.00',
            'selesai' => '15.30',
            'thnAjar'=> 'Gasal 2024/2025',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK3202',
            'nidn' => '24040123456789',
            'kelas' => 'A',
            'hari' => 'Senin',
            'mulai' => '07.00',
            'selesai' => '10.20',
            'thnAjar'=> 'Gasal 2024/2025',
            'kuota' => '100',
            'ruang' => 'E101',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK3201',
            'nidn' => '24030123456789',
            'kelas' => 'C',
            'hari' => 'Selasa',
            'mulai' => '13.00',
            'selesai' => '16.20',
            'thnAjar'=> 'Genap 2023/2024',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK1021',
            'nidn' => '24040123456789',
            'kelas' => 'A',
            'hari' => 'Rabu',
            'mulai' => '07.00',
            'selesai' => '09.30',
            'thnAjar'=> 'Gasal 2024/2025',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK2022',
            'nidn' => '24062123456789',
            'kelas' => 'A',
            'hari' => 'Kamis',
            'mulai' => '13.00',
            'selesai' => '15.30',
            'thnAjar'=> 'Gasal 2024/2025',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK1111',
            'nidn' => '24010123456789',
            'kelas' => 'A',
            'hari' => 'Senin',
            'mulai' => '13.00',
            'selesai' => '15.30',
            'thnAjar'=> 'Genap 2023/2024',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK2222',
            'nidn' => '24020123456789',
            'kelas' => 'D',
            'hari' => 'Selasa',
            'mulai' => '13.00',
            'selesai' => '14.40',
            'thnAjar'=> 'Genap 2023/2024',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK3333',
            'nidn' => '24040123456789',
            'kelas' => 'A',
            'hari' => 'Senin',
            'mulai' => '07.00',
            'selesai' => '10.20',
            'thnAjar'=> 'Genap 2023/2024',
            'kuota' => '100',
            'ruang' => 'E101',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK4444',
            'nidn' => '24030123456789',
            'kelas' => 'C',
            'hari' => 'Selasa',
            'mulai' => '07.00',
            'selesai' => '08.40',
            'thnAjar'=> 'Genap 2023/2024',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK5555',
            'nidn' => '24040123456789',
            'kelas' => 'A',
            'hari' => 'Rabu',
            'mulai' => '07.00',
            'selesai' => '07.50',
            'thnAjar'=> 'Genap 2023/2024',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $Jadwal = jadwal::create([
            'kodeMK' => 'PAIK6666',
            'nidn' => '24062123456789',
            'kelas' => 'A',
            'hari' => 'Kamis',
            'mulai' => '13.00',
            'selesai' => '15.30',
            'thnAjar'=> 'Genap 2023/2024',
            'kuota' => '50',
            'ruang' => 'A303',
        ]);

        $IRS = irs::create([
            'smt' => 4,
            'nim' => '24160122131000',
            'kodeMK'=> 'PAIK3201',
            'nidn' => '24030123456789',
            'kelas' => 'C',
            'totalSKS' => 4,
            'ruang' => 'A303',
        ]);

        $Jadwal = irs::create([
            'kodeMK' => 'PAIK1111',
            'nidn' => '24010123456789',
            'smt' => 4,
            'nim' => '24160122131000',
            'kelas' => 'A',
            'totalSKS' => 3,
            'ruang' => 'A303',
        ]);

        $Jadwal = irs::create([
            'kodeMK' => 'PAIK2222',
            'nidn' => '24020123456789',
            'kelas' => 'D',
            'smt' => 4,
            'nim' => '24160122131000',
            'totalSKS' => 2,
            'ruang' => 'A303',
        ]);

        $Jadwal = irs::create([
            'kodeMK' => 'PAIK3333',
            'nidn' => '24040123456789',
            'kelas' => 'A',
            'smt' => 4,
            'nim' => '24160122131000',
            'totalSKS' => 4,
            'ruang' => 'E101',
        ]);

        $Jadwal = irs::create([
            'kodeMK' => 'PAIK4444',
            'nidn' => '24030123456789',
            'kelas' => 'C',
            'smt' => 4,
            'nim' => '24160122131000',
            'totalSKS' => 2,
            'ruang' => 'A303',
        ]);

        $Jadwal = irs::create([
            'kodeMK' => 'PAIK5555',
            'nidn' => '24040123456789',
            'kelas' => 'A',
            'smt' => 4,
            'nim' => '24160122131000',
            'totalSKS' => 1,
            'ruang' => 'A303',
        ]);

        $Jadwal = irs::create([
            'kodeMK' => 'PAIK6666',
            'nidn' => '24062123456789',
            'kelas' => 'A',
            'smt' => 4,
            'nim' => '24160122131000',
            'totalSKS' => 3,
            'ruang' => 'A303',
        ]);

        $KHS = khs::create([
            'smt' => 4,
            'nim' => '24160122131000',
            'kodeMK'=> 'PAIK3201',
            'nilai'=> 'E',
            'ips' => '0.0',
            'ipk' => '1.90',
        ]);

        $Jadwal = khs::create([
            'kodeMK' => 'PAIK1111',
            'smt' => 4,
            'nim' => '24160122131000',
            'nilai'=> 'E',
            'ips' => '0.0',
            'ipk' => '1.90',
        ]);

        $Jadwal = khs::create([
            'kodeMK' => 'PAIK2222',
            'nim' => '24160122131000',
            'smt' => 4,
            'nilai'=> 'E',
            'ips' => '0.0',
            'ipk' => '1.90',
        ]);

        $Jadwal = khs::create([
            'kodeMK' => 'PAIK3333',
            'nim' => '24160122131000',
            'smt' => 4,
            'nilai'=> 'E',
            'ips' => '0.0',
            'ipk' => '1.90',
        ]);

        $Jadwal = khs::create([
            'kodeMK' => 'PAIK4444',
            'nim' => '24160122131000',
            'smt' => 4,
            'nilai'=> 'E',
            'ips' => '0.0',
            'ipk' => '1.90',
        ]);

        $Jadwal = khs::create([
            'kodeMK' => 'PAIK5555',
            'nim' => '24160122131000',
            'smt' => 4,
            'nilai'=> 'E',
            'ips' => '0.0',
            'ipk' => '1.90',
        ]);

        $Jadwal = khs::create([
            'kodeMK' => 'PAIK6666',
            'nim' => '24160122131000',
            'smt' => 4,
            'nilai'=> 'E',
            'ips' => '0.0',
            'ipk' => '1.90',
        ]);
    }
}
