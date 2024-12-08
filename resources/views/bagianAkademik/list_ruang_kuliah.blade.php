<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Ruang Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Agar footer selalu berada di bawah */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
        }

        footer {
            margin-top: auto; /* Pastikan footer selalu berada di bawah */
        }
    </style>
</head>

<body class="bg-[#D6EFD8]">
    <!-- Header -->
    <div class="bg-[#508D4E] text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">UNIVERSITAS DIPONEGORO</h1>
        <div class="flex items-center">
            <span class="mr-4 font-semibold">Smith Welson</span>
            <img class="w-12 h-12 rounded-full" src="{{ asset('images/SW2.png')}}" alt="User Avatar">
        </div>
    </div>

    <!-- Title Section -->
    <div class="flex items-center justify-between px-6 mt-10">
        <a href="/dashboard/bagianakademik" class="text-lg font-semibold ml-5 text-gray-700">< Kembali</a>
        <h1 class="text-3xl font-bold text-center flex-grow mr-16">PENGAJUAN RUANG KULIAH</h1>
    </div>

    <!-- Table Wrapper -->
    <div class="bg-[#D9D9D9] rounded-lg shadow-md p-2 mb-2 w-3/4 mt-10 mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center text-black font-semibold text-sm">
            <div class="w-1/4 text-center">Departemen</div>
            <div class="w-1/4 text-center">Detail</div>
        </div>
    </div>
    
    <!-- Baris Data -->
    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-5">
        <div class="w-1/4 text-center text-sm">Informatika</div>
        <div class="w-1/4 text-center">
            <button onclick="window.location.href='{{ url('/ruang')}}'"" 
            class="bg-[#80AF81] text-white font-semibold py-1 px-3 rounded-full hover:bg-green-400 text-sm">
            Detail
            </button>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-1">
        <div class="w-1/4 text-center text-sm">Matematika</div>
        <div class="w-1/4 text-center">
            <a href="/detail-list-ruang-kuliah" 
            class="bg-[#80AF81] text-white font-semibold py-1 px-3 rounded-full hover:bg-green-400 text-sm">
            Detail
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-1">
        <div class="w-1/4 text-center text-sm">Fisika</div>
        <div class="w-1/4 text-center">
            <a href="/detail-list-ruang-kuliah" 
            class="bg-[#80AF81] text-white font-semibold py-1 px-3 rounded-full hover:bg-green-400 text-sm">
            Detail
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-1">
        <div class="w-1/4 text-center text-sm">Kimia</div>
        <div class="w-1/4 text-center">
            <a href="/detail-list-ruang-kuliah" 
            class="bg-[#80AF81] text-white font-semibold py-1 px-3 rounded-full hover:bg-green-400 text-sm">
            Detail
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-1">
        <div class="w-1/4 text-center text-sm">Statistika</div>
        <div class="w-1/4 text-center">
            <a href="/detail-list-ruang-kuliah" 
            class="bg-[#80AF81] text-white font-semibold py-1 px-3 rounded-full hover:bg-green-400 text-sm">
            Detail
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-1">
        <div class="w-1/4 text-center text-sm">Biologi</div>
        <div class="w-1/4 text-center">
            <a href="/detail-list-ruang-kuliah" 
            class="bg-[#80AF81] text-white font-semibold py-1 px-3 rounded-full hover:bg-green-400 text-sm">
            Detail
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-1">
        <div class="w-1/4 text-center ml-1 text-sm">Bio Teknologi</div>
        <div class="w-1/4 text-center ">
            <a href="/detail-list-ruang-kuliah" 
            class="bg-[#80AF81] text-white font-semibold py-1 px-3 rounded-full hover:bg-green-400 text-sm">
            Detail
            </a>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-[#508D4E] text-white text-center py-3 mt-14">
        <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
    </footer>

</body>
</html>