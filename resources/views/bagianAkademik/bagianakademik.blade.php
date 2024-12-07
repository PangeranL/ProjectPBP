<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dekan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#D6EFD8]">
        <!-- Header -->
        <div class="container mx-auto p-6">
            <div class="bg-[#508D4E] text-white p-3 rounded-lg shadow-md">
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-xl font-bold p-3">UNIVERSITAS DIPONEGORO</h1>
                    </div>
                    <div class="flex items-center">
                        <span class="mr-4">Smith Wilson</span>
                        <img class="w-14 h-14 rounded-full" src="{{ asset('images/SW2.png')}}" alt="User Avatar">
                    </div>
                </div>
            </div>

        <!-- Main Content -->
        <div class="container mx-auto p-7">
            <div class="bg-[#80AF81] text-white p-6 rounded-lg shadow-md flex">
                <!-- Left Section -->
                <div class="mr-6">
                    <img class="rounded-lg" style="width: 300px; height: 324px;" src="{{ asset('images/SW2.png')}}" alt="User Avatar">
                </div>
                <!-- Right Section -->
                <div class="bg-[#508D4E] p-4 rounded-lg flex-1">
                    <h1 class="text-2xl font-bold mb-3">Selamat Datang,</h1>
                    <h1 class="text-2xl font-bold mb-5">Dr. Smith Welson B.Sc., M.Cs.</h1>
                    <p class="text-base mb-2">NIP. 198405021007083020</p>
                    <p class="text-base mb-5">Smithwelson@Lecturer.Undip.Ac.Id</p>
                    <hr class="border-white mb-5">
                    <p class="text-lg font-bold mb-2">Universitas Diponegoro</p>
                    <p class="text-lg font-bold mb-2">Fakultas Sains dan Matematika</p>
                    <p class="text-lg font-bold">Departemen Informatika</p>
                </div>
            </div>
        </div>

        <!-- Layanan Akademik -->
        <div class="container mx-auto w-1/2 ml-1 p-7">
            <div class="bg-[#80AF81] rounded-lg shadow-md p-6">
                <h1 class="text-2xl font-bold text-white mb-4">LAYANAN AKADEMIK</h1>
                <div class="grid grid-cols-2 gap-4">
                    <!-- List Ruang Kuliah -->
                    <button onclick="window.location.href='/bagianAkademik/list_ruang_kuliah'" class="text-sm font-bold text-white bg-green-600 py-2 rounded-lg w-full flex items-center space-x-3">
                        <!-- Logo Gambar di sebelah kiri -->
                        <img src="{{ asset('images/list.png')}}" alt="Logo" class="w-12 h-12">
                        <!-- Teks nempel kanan -->
                        <span class="mr-2">PENGAJUAN RUANG KULIAH</span>
                    </button>
                    <button onclick="window.location.href='{{ url('/ruangs')}}'"" class="text-sm font-bold text-white bg-green-600 py-2 rounded-lg w-full flex items-center space-x-3">
                        <!-- Logo Gambar di sebelah kiri -->
                        <img src="{{ asset('images/list.png')}}" alt="Logo" class="w-12 h-12">
                        <!-- Teks nempel kanan -->
                        <span class="mr-2">LIST RUANG KULIAH</span>
                    </button>
                </div>
            </div>
        </div>

        
        

        <!-- Footer -->
        <div class="mt-6 bg-[#508D4E] text-white p-4 shadow-md rounded-lg text-center">
            <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
        </div>
    </div>
</body>
</html>