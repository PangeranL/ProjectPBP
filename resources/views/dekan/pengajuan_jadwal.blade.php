<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Jadwal Kuliah</title>
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
                    <span class="mr-4">Julianto</span>
                    <img class="w-14 h-14 rounded-full" src="{{ asset('images/Julianto.png') }}" alt="User Avatar">
                </div>
            </div>
        </div>

    <!-- Title Section -->
    <div class=" container mt-3 mx-auto">
        <h1 class="text-3xl text-center font-bold">PENGAJUAN JADWAL KULIAH</h1>
    </div>

    <div class=" container ml-12 mb-0 px-40 ">
        <a href="/dashboard/dekan" class="text-lg font-semibold   text-gray-700">< Kembali</a>
    </div>


    <!-- Table Wrapper -->
    <div class="bg-[#D9D9D9] rounded-lg shadow-md p-2 mb-2 w-3/4 mt-5 mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center text-black font-semibold text-sm">
            <div class="w-1/4 text-center">Departemen</div>
            <div class="w-1/4 text-center">Detail</div>
        </div>
    </div>
    
    <!-- Baris Data -->
    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-4">
        <div class="w-1/4 text-center text-sm">Informatika</div>
        <div class="w-1/4 text-center">
            <button onclick="window.location.href='{{ url('/jadwal')}}'"
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
        <div class="w-1/4 text-center ml-1 text-sm">BioTeknologi</div>
        <div class="w-1/4 text-center ">
            <a href="/detail-list-ruang-kuliah" 
            class="bg-[#80AF81] text-white font-semibold py-1 px-3 rounded-full hover:bg-green-400 text-sm">
            Detail
            </a>
        </div>
    </div>
    
    <!-- Footer -->

        <div class="mt-6 bg-[#508D4E] text-white p-4 rounded-lg shadow-md text-center">
            <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
        </div>
</body>
</html>