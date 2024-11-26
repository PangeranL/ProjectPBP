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
                <a href="/Menyusun" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/menyusun.png">
                    <span>Menyusun Jadwal</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/monitoring.png">
                    <span>Monitoring IRS</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="text-3xl font-semibold mb-8" style="color: #508D4E">Menyusun Jadwal</div>
            <div class="p-5 rounded-lg mb-8" style = "background-color: #D6EFD8; height: 692px">
                <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-2" style="margin-left:1px;"> 
                    <a href="/Menyusun" class="flex items-center space-x-2 hover:bg-white p-2 rounded">  
                    <img src="/images/atur.png" alt="">
                    <button style="color: #508D4E">Pengaturan Ketentuan Mata Kuliah</button>
                    </a>
                    <div class="flex justify-between" style="margin-left: 50px; width:15%">
                        <a href="/Buat" class="flex items-center space-x-2 hover:bg-white p-2 rounded">
                        <img src="/images/buat.png" alt="">
                        <button style="color: #508D4E">Buat Jadwal</button>
                        </a>
                    </div>
                </div>
                <div class="w-full h-1 mt-4" style="border: 2px solid #508D4E;"></div>
                <div class="flex justify-between; items-center" style="margin-left: 5px; margin-top: 15px; width:37%">
                    <img src="/images/atur.png" style="width: 35px" alt="">
                    <p class="font-semibold" style="color: #508D4E; font-size: 20px; margin-left: 5px">Pengaturan Ketentuan Mata Kuliah</p>
                </div>

                <div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Tahun Ajaran
                        <select name="" id="" style="width: 30%; margin-left: 100px">
                            <option value="">Semester Ganjil 2025/2026</option>
                            <option value="">Semester Genap 2025/2026</option>
                        </select>
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Semester
                        <select name="" id="" style="width: 30%; margin-left: 126px">
                            <option value="">Semester 1</option>
                            <option value="">Semester 2</option>
                            <option value="">Semester 3</option>
                        </select>
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Mata Kuliah
                        <select name="" id="" style="width: 30%; margin-left: 110.5px">
                            <option value="">Basis Data</option>
                            <option value="">Algoritma Pemrograman</option>
                            <option value="">Dasar Pemrograman</option>
                        </select>
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Kode Mata Kuliah
                        <select name="" id="" style="width: 30%; margin-left: 67.5px">
                            <option value="">PAIK6501</option>
                            <option value="">PAIK6303</option>
                            <option value="">PAIK6304</option>
                        </select>
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Jumlah SKS
                        <select name="" id="" style="width: 30%; margin-left: 108.5px">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                        </select>
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Dosen Pengampu
                        <select name="" id="" style="width: 30%; margin-left: 65.5px">
                            <option value="">Edy Suharto S.T., M.Kom</option>
                            <option value="">Guruh Aryotejo S.Kom., M.Sc</option>
                            <option value="">Dr.Eng. Adi Wibowo S.Si., M.Kom.</option>
                            <option value="">Rismiyati B.Eng, M.Cs</option>
                            <option value="">Sandy Kurniawan S.Kom., M.Kom.</option>
                            <option value="">Dr. Helmie Arif Wibawa S.Si., M.Cs.</option>
                        </select>
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 15px; margin-left: 5px;">
                        <select name="" id="" style="width: 30%; margin-left: 203px">
                        <option value="">Edy Suharto S.T., M.Kom</option>
                            <option value="">Guruh Aryotejo S.Kom., M.Sc</option>
                            <option value="">Dr.Eng. Adi Wibowo S.Si., M.Kom.</option>
                            <option value="">Rismiyati B.Eng, M.Cs</option>
                            <option value="">Sandy Kurniawan S.Kom., M.Kom.</option>
                            <option value="">Dr. Helmie Arif Wibawa S.Si., M.Cs.</option>
                        </select>
                    </div>
                    <div class="flex justify-between" style="margin-left: 209px; margin-top: 15px; width: 24%">
                        <img src="/image/add.png" alt="">
                        <button style="color: #508D4E">Tambah Dosen Pengampu</button>
                    </div>
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-2" style="margin-left:10px; margin-top: 40px">   
                        <button class="bg-red-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">RESET</button>
                        <div class="flex justify-between" style="margin-left: 50px; width:12.5%">
                            <button class="bg-green-800 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>