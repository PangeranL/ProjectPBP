<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Pengaturan Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{asset('/css/dashboard.css')}}" rel="stylesheet">
</head>
<body class="bg-gray-100" style = "overflow: hidden">
    <div class="flex flex-col md:flex-row">
<!-- Sidebar -->
<div class="w-full md:w-1/4 h-full md:h-screen p-5 flex flex-col" style = "background-color: #80AF81">
            <div class="flex ">
                    <img src="/images/logo.png"  class="w-20 h-20 object-cover" >
                    <div class="flex flex-col items-center justify-center">
                        <div class="text-4 text-white text-2xl spac font-bold">SIKAT UNDIP</div>
                        <div class=" h-[9px] border w-full bg-black"></div>
                        <div class="text-white text-xs mb-8 text-center">Sistem Informasi Kuliah Akademik Terpadu<br>Universitas Diponegoro</div>
                    </div>
            </div>
            <nav class="space-y-4 text-white text-lg">
                <a href="/Dashboard" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/dashboard.png">
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/profil.png">
                    <span>Profil</span>
                </a>

                <a href="/TabelMK" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" alt="">
                    <span>Input Mata Kuliah</span>
                </a>
                <a href="TabelJD" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" alt="">
                    <span>Input Jadwal Kuliah</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="text-3xl font-semibold mb-8" style="color: #508D4E">Menyusun Jadwal Kuliah</div>
            <div class="p-5 rounded-lg mb-8" style = "background-color: #D6EFD8; height: 692px">
                <div class="flex justify-between; items-center" style="margin-left: 5px; width:37%">
                    <img src="/images/atur.png" style="width: 35px" alt="">
                    <p class="font-semibold" style="color: #508D4E; font-size: 20px; margin-left: 5px">Pengaturan Jadwal Kuliah</p>
                </div>
                <div class="w-full h-1 mt-4" style="border: 2px solid #508D4E;"></div>
                
                <div class="font-semibold" style="color: #508D4E; margin-top: 20px; margin-left: 5px;">Tahun Ajaran
                        <select name="" id="" style="width: 30%; margin-left: 100px">
                            <option value="">Semester Ganjil 2025/2026</option>
                            <option value="">Semester Genap 2025/2026</option>
                        </select>
                    </div>


                    <div class="font-semibold" style="color: #508D4E; margin-top: 20px; margin-left: 5px;">Semester
                        <select name="" id="" style="width: 30%; margin-left: 126px">
                            <option value="">Semester 1</option>
                            <option value="">Semester 2</option>
                            <option value="">Semester 3</option>
                        </select>
                    </div>


                    <div class="font-semibold" style="color: #508D4E; margin-top: 20px; margin-left: 5px;">Mata Kuliah
                        <select name="" id="" style="width: 30%; margin-left: 110.5px">
                            <option value="">Basis Data</option>
                            <option value="">Algoritma Pemrograman</option>
                            <option value="">Dasar Pemrograman</option>
                        </select>
                    </div>

                    <div class="font-semibold" style="color: #508D4E; margin-top: 20px; margin-left: 5px;">Kelas
                        <select name="" id="" style="width: 30%; margin-left: 157px">
                            <option value="">A</option>
                            <option value="">B</option>
                            <option value="">C</option>
                            <option value="">D</option>
                            <option value="">E</option>
                        </select>
                    </div>
                    
                    <div class="font-semibold" style="color: #508D4E; margin-top: 20px; margin-left: 5px;">Hari
                        <select name="" id="" style="width: 30%; margin-left: 166.5px">
                            <option value="">Senin</option>
                            <option value="">Selasa</option>
                            <option value="">Rabu</option>
                            <option value="">Kamis</option>
                            <option value="">Jumat</option>
                        </select>
                    </div>


                    <div class="font-semibold" style="color: #508D4E; margin-top: 20px; margin-left: 5px;">Ruang
                        <select name="" id="" style="width: 30%; margin-left: 150px">
                            <option value="">E101</option>
                            <option value="">E102</option>
                            <option value="">E103</option>
                            <option value="">K101</option>
                            <option value="">K102</option>
                            <option value="">K202</option>
                        </select>
                    </div>

                    
                    <div>
                        <div class="font-semibold" style="color: #508D4E; margin-top: 20px; margin-left: 5px;">Waktu Mulai
                        <input type="time" style="width: 30%; margin-left: 105px">
                    </div>
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-2" style="margin-left:10px; margin-top: 40px">   
                        <a href="/TabelJD"class="bg-green-800 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">TAMBAH JADWAL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>