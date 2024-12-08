<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard DEKAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#D6EFD8]">
    <div class="container mx-auto p-6">
        <div class="bg-[#508D4E] text-white p-3 rounded-lg shadow-md">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-xl font-bold p-3">UNIVERSITAS DIPONEGORO</h1>
                </div>
                <div class="flex items-center">
                    <span class="mr-4">Julianto</span>
                    <img class="w-14 h-14 rounded-full" src="{{ asset('images/Julianto.png')}}" alt="User Avatar">
                </div>
            </div>
        </div>
        
        <div class="container mx-auto mt-6 mb-3" style="width: 100%;">
  <div class="bg-[#80AF81] text-white p-3 rounded-lg shadow-md">
    <div class="flex justify-between">
      <div>
        <div class="p-1 mt-3 mr-3 ml-3 mb-3">
          <img class="rounded-lg" style="width: 290px; height: 275px;" src="{{ asset('images/Julianto.png') }}" alt="User Avatar">
        </div>
      </div>
      <div class="bg-[#508D4E] p-2 mt-4 mx-3 mb-3 rounded-lg" style="width: calc(100% - 300px);">
        <h1 class="text-2xl font-bold ml-3 mt-3 text-left">Selamat Datang,</h1>
        <h1 class="text-2xl font-bold ml-3 text-left">Julianto B.Sc., M.Cs.</h1>
        <p class="text-base font-sans ml-3 mt-5 text-left">NIP. 198405021008074020</p>
        <p class="text-base font-sans ml-3 text-left">juliantohh@lecturer.Undip.ac.id</p>
        <div class="border-t border-white ml-3 mt-3" style="width: 100%;"></div>
        <p class="text-bold font-outfit ml-3 mt-3 text-left">Universitas Diponegoro</p>
        <p class="text-bold font-outfit ml-3 text-left">Fakultas Sains dan Matematika</p>
        <p class="text-bold font-outfit ml-3 text-left">Departemen Informatika</p>
      </div>
    </div>
  </div>
</div>

<div class="container mt-6 ml-0 mx-auto w-1/2">
  <div class="bg-[#80AF81] rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold text-white mb-4">LAYANAN AKADEMIK</h1>
    <!-- Flexbox Container -->
    <div class="flex gap-4">
      <!-- Kolom Kiri -->
      <div class="flex-1 p-4 rounded-lg">
        <button onclick="window.location.href='/dekan/pengajuan_jadwal'" class="text-lg font-bold text-right text-white bg-green-600 py-2 px-4 rounded-lg w-full">PENGAJUAN JADWAL KULIAH</button>
      </div>
      <!-- Kolom Kanan -->
      <div class="flex-1 p-4 rounded-lg">
        <button onclick="window.location.href='/dekan/pengajuan_ruangan'" class="text-lg font-bold text-right text-white bg-green-600 py-2 px-4 rounded-lg w-full">PENGAJUAN RUANG KULIAH</button>
      </div>
    </div>
  </div>
</div>


        <!-- Footer -->
        <div class="mt-6 bg-[#508D4E] text-white p-4 rounded-lg shadow-md text-center">
            <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
        </div>
</body>
</html>