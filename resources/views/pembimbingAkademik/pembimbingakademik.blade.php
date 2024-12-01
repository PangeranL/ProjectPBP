<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100">
    <div class="bg-green-700 h-20 flex justify-between items-center px-8 text-white fixed w-full top-0">
        <div class="flex items-center">
            <img src="{{ asset('images/UNDIP.png') }}" alt="Universitas Diponegoro" class="w-14 mr-2">
            <h1 class="text-xl">DIPONEGORO UNIVERSITY</h1>
        </div>
        <div class="relative">
            <!-- Profile Section -->
            <button onclick="toggleDropdown()" class="flex items-center focus:outline-none">
                <span class="mr-4">Doel</span>
                <img class="w-10 h-10 rounded-full" src="{{ asset('images/dora.jpg') }}" alt="User Avatar">
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded shadow-lg">
                <a type="submit" class="block w-full text-left px-4 py-2 hover:bg-green-100" href="/logout">Logout</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="mt-24 px-8">
        <!-- Profile Section -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center space-x-4">
                <img class="w-16 h-16 rounded-full" src="{{ asset('images/dora.jpg') }}" alt="User Avatar">
                <div>
                    <h2 class="text-2xl font-bold text-green-700">Doel</h2>
                    <p>NIDN: 24050123456789</p>
                    <p class="text-gray-500">sidoel@lectures.undip.ac.id</p>
                </div>
            </div>
            <p class="mt-4 text-gray-600">
                Diponegoro University <br>
                Fakultas Sains Dan Matematika <br>
                Departemen Informatika
            </p>
        </div>

        <!-- Academic Services Section -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-4">
            <h3 class="text-lg font-bold mb-4">Layanan Akademik</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <button class="bg-green-700 text-white py-2 px-4 rounded shadow">Kelas Online</button>
                <button class="bg-green-700 text-white py-2 px-4 rounded shadow">Jadwal Mengajar</button>
                <button class="bg-green-700 text-white py-2 px-4 rounded shadow">Akses IRS</button>
                <a href="/daftarIRS" class="bg-green-700 text-white text-center py-2 px-4 rounded shadow">Verifikasi IRS</a>
                <button class="bg-green-700 text-white py-2 px-4 rounded shadow">Berita</button>
                <button class="bg-green-700 text-white py-2 px-4 rounded shadow">Surat Elektronik</button>
            </div>
        </div>

        <!-- Schedule Section -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-4">
            <h3 class="text-lg font-bold mb-2">Jadwal Perkuliahan</h3>
            <p class="text-gray-500 mb-4">Kamis, 20 Agustus 2024</p>
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Nama MK</th>
                        <th class="border px-4 py-2">Ruang</th>
                        <th class="border px-4 py-2">Jam</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">Struktur Diskrit</td>
                        <td class="border px-4 py-2">A201</td>
                        <td class="border px-4 py-2">07.00 - 09.30</td>
                        <td class="border px-4 py-2 text-center"><a href="#" class="text-blue-500">Lihat</a></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Matematika 1</td>
                        <td class="border px-4 py-2">A202</td>
                        <td class="border px-4 py-2">09.40 - 10.20</td>
                        <td class="border px-4 py-2 text-center"><a href="#" class="text-blue-500">Lihat</a></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Metode Numerik</td>
                        <td class="border px-4 py-2">A202</td>
                        <td class="border px-4 py-2">13.00 - 15.00</td>
                        <td class="border px-4 py-2 text-center"><a href="#" class="text-blue-500">Lihat</a></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Machine Learning</td>
                        <td class="border px-4 py-2">E102</td>
                        <td class="border px-4 py-2">16.00 - 18.00</td>
                        <td class="border px-4 py-2 text-center"><a href="#" class="text-blue-500">Lihat</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Footer -->
    <div class="bg-green-700 text-white h-16 flex items-center justify-center fixed bottom-0 w-full">
        <h3 class="text-center">TIM IT SIKAT © 2024 UNDIP, All Right Reserved.</h3>
    </div>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function (e) {
            const dropdown = document.getElementById('dropdownMenu');
            const button = dropdown.previousElementSibling;
            if (!dropdown.contains(e.target) && !button.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>