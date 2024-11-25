<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Ruang Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Settingan Check Box -->
    <style>
        input[type="checkbox"] {
            appearance: none;
            width: 25px;
            height: 25px;
            border: 2px solid #508D4E;
            border-radius: 4px;
            cursor: pointer;
            outline: none;
            transition: all 0.3s ease;
        }
    
        input[type="checkbox"]:checked {
            background-color: #508D4E; /* Warna background hijau */
            border-color: #508D4E;
            background-image: url('image/Checkbox.png'); /* URL gambar Anda */
            background-size: cover; /* Gambar menutupi kotak */
            background-position: center; /* Gambar di tengah */
            background-repeat: no-repeat; /* Hindari pengulangan gambar */
        }
    </style>
</head>
<body class="bg-[#D6EFD8]">
    <!-- Header -->
    <div class="bg-[#508D4E] text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">UNIVERSITAS DIPONEGORO</h1>
        <div class="flex items-center">
            <span class="mr-4 font-semibold">Smith Welson</span>
            <img class="w-12 h-12 rounded-full" src="image/SW2.png" alt="User Avatar">
        </div>
    </div>

    <!-- Title Section -->
    <div class="flex items-center justify-between px-6 mt-10">
        <a href="/pengajuan-ruang-kuliah" class="text-lg font-semibold ml-5 text-gray-700">< Kembali</a>
        <h1 class="text-3xl font-bold text-center flex-grow mr-16">PENGAJUAN RUANG KULIAH</h1>
        <a href="/list-pengajuan-ruang-kuliah" class="text-lg font-semibold mr-5 text-gray-700">Request ></a>
    </div>

    <!-- Table Wrapper -->
    <div class="bg-[#D9D9D9] rounded-lg shadow-md p-2 mb-2 w-3/4 mt-10 mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center text-black font-semibold text-sm">
            <div class="w-1/4 text-center">Status Ruangan</div>
            <div class="w-1/4 text-center">Kode Ruang</div>
            <div class="w-1/4 text-center">Kuota</div>
            <div class="w-1/4 text-center">Request</div>
        </div>
    </div>
    
    <!-- Baris Data -->
    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto mt-4 ">
        <div class="w-1/4 text-center text-sm">Tersedia</div>
        <div class="w-1/4 text-center">E103</div>
        <div class="w-1/4 text-center">50</div>
        <div class="w-1/4 text-center mt-1">
            <input type="checkbox">
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto">
        <div class="w-1/4 text-center text-sm">Tersedia</div>
        <div class="w-1/4 text-center">K202</div>
        <div class="w-1/4 text-center">50</div>
        <div class="w-1/4 text-center mt-1">
            <input type="checkbox">
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto">
        <div class="w-1/4 text-center text-sm">Tersedia</div>
        <div class="w-1/4 text-center">A303</div>
        <div class="w-1/4 text-center">50</div>
        <div class="w-1/4 text-center mt-1">
            <input type="checkbox">
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto">
        <div class="w-1/4 text-center text-sm">Tersedia</div>
        <div class="w-1/4 text-center">A302</div>
        <div class="w-1/4 text-center">50</div>
        <div class="w-1/4 text-center mt-1">
            <input type="checkbox">
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto">
        <div class="w-1/4 text-center text-sm">Tersedia</div>
        <div class="w-1/4 text-center">K102</div>
        <div class="w-1/4 text-center">50</div>
        <div class="w-1/4 text-center mt-1">
            <input type="checkbox">
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto">
        <div class="w-1/4 text-center text-sm">Tersedia</div>
        <div class="w-1/4 text-center">K103</div>
        <div class="w-1/4 text-center">50</div>
        <div class="w-1/4 text-center mt-1">
            <input type="checkbox">
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto">
        <div class="w-1/4 text-center text-sm">Tersedia</div>
        <div class="w-1/4 text-center">K102</div>
        <div class="w-1/4 text-center">50</div>
        <div class="w-1/4 text-center mt-1">
            <input type="checkbox">
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2 w-3/4 mx-auto">
        <div class="w-1/4 text-center text-sm">Tersedia</div>
        <div class="w-1/4 text-center">K201</div>
        <div class="w-1/4 text-center">50</div>
        <div class="w-1/4 text-center mt-1">
            <input type="checkbox">
        </div>
    </div>
    

    <!-- Footer -->
    <footer class="bg-[#508D4E] text-white text-center py-3 mt-8">
        <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
    </footer>
</body>
</html>