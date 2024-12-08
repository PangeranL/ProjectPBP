<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 overflow-x-hidden">

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
                    <img src="/images/dashboard.png" class="w-6 h-6">
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/profil.png" class="w-6 h-6">
                    <span>Profil</span>
                </a>
                <a href="/kaprodi/inputMK" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" class="w-6 h-6">
                    <span>Input Mata Kuliah</span>
                </a>
                <a href="/kaprodi/inputJD" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" class="w-6 h-6">
                    <span>Input Jadwal Kuliah</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 md:p-8">
            <!-- Dashboard Header -->
            <div class="text-3xl font-semibold mb-8" style="color: #508D4E;">Dashboard</div>

            <!-- Welcome Card -->
            <div class="p-6 rounded-lg mb-8 bg-green-100" style="background-color: #D6EFD8; height: 200px;">
                <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                    <img src="/images/foto.png" alt="Profile" class="w-32 h-32 rounded-full">
                    <div class="text-center md:text-left">
                        <div class="text-xl font-semibold text-green-700">Selamat Datang,</div>
                        <div class="text-xl font-bold text-green-700">Dr. Bryan Sutedja, B.Sc., M.Cs</div>
                        <div class="w-full h-1 mt-4 border-2 border-green-700"></div>
                        <div class="text-sm font-semibold text-green-700 mt-4">NIP: 198506012008072010</div>
                        <div class="text-sm font-semibold text-green-700">Email: bryansutedja@lecturer.dips.ac.id</div>
                        <div class="text-sm font-semibold text-green-700">No. Telp: +62 813 8576 1985</div>
                    </div>
                </div>
            </div>

            <!-- Statistics/Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4" style="height: 460px;">
                <div class="h-40 rounded-lg" style="background-color: #D6EFD8"></div>
                <div class="h-40 rounded-lg" style="background-color: #D6EFD8"></div>
            </div>
        </div>
    </div>

</body>
</html>