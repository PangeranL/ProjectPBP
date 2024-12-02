<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat IRS</title>
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
                <span class="mr-4">Kim Dokja</span>
                <img class="w-10 h-10 rounded-full" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded shadow-lg">
                <a type="submit" class="block w-full text-left px-4 py-2 hover:bg-green-100" href="/logout">Logout</a>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="mt-24 px-8">
        <!-- Verifikasi IRS Section -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold mb-4">IRS</h3>
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Semester</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop untuk menampilkan data unverified IRS -->
                    @foreach ($irs as $irs)
                        <tr>
                            <td class="border px-4 py-2">{{ $irs->smt }}</td>
                            <td class="border px-4 py-2 text-center">
                                <!-- Tambahkan aksi untuk verifikasi IRS jika diperlukan -->
                                <a href="{{ route('DetailIRS', ['nim' => $irs->nim, 'smt' => $irs->smt]) }}" class="text-blue-500">Detail</a>
                            </td>
                        </tr>
                    @endforeach
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