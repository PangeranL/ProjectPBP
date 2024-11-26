<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
            <div class="text-3xl font-semibold mb-8" style="color: #508D4E">Dashboard</div>
            <div class="p-6 rounded-lg mb-8" style = "background-color: #D6EFD8; height: 200px">
                <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                    <img src="/images/foto.png" alt="Profile" class="w-20 h-20" style="width: 180px; height: 180px; margin-top: -13px">
                    <div class="text-center md:text-left" style="margin-left: 50px">
                        <div class="text-1 text-xl font-semibold" style = "color: #508D4E">Selamat Datang,</div>
                        <div class="text-1 text-xl font-bold" style = "color: #508D4E">Dr. Bryan Sutedja, B.Sc., M.Cs</div>
                        <div class="w-full h-1 mt-4" style="border: 2px solid #508D4E;"></div>
                        <div class="text-2 font-semibold" style = "color: #508D4E; margin-top: 10px">NIP: 198506012008072010</div>
                        <div class="text-3 font-semibold" style = "color: #508D4E">Email: bryansutedja@lecturer.dips.ac.id</div>
                        <div class="text-3 font-semibold" style = "color: #508D4E">No. Telp: +62 813 8576 1985</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4"style = "height: 460px">
                <div class="h-40 rounded-lg" style = "background-color: #D6EFD8; height: 100%;"></div>
                <div class="h-40 rounded-lg" style = "background-color: #D6EFD8; height: 100%;"></div>
            </div>
        </div>
    </div>
</body>
</html>