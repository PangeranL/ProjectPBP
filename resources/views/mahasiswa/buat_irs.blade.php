<!-- resources/views/buat_irs.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkuliahan IRS</title>
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
        <div class="bg-white p-6 pb-1 mb-20 rounded-lg shadow-md">
            <h3 class="text-lg font-bold text-black mb-4">Buat IRS</h3>
            <div class="mb-4">
                <label for="sks" class="block text-gray-700 font-semibold">Total SKS yang Dapat Diambil</label>
                <input type="text" id="sks" name="sks" class="border p-2 rounded w-10 bg-gray-200" value="{{ $maks }}" readonly>
            </div>
            <div class="bg-white mt-4 p-6 mb-16 rounded-lg shadow-md">
                <form action="{{ route('simpanIRS') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold">NIM</label>
                        <input type="text" name="nim" value="{{ $nim }}" class="border p-2 rounded w-full" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold">Semester</label>
                        <input type="text" name="smt" value="{{ $smt }}" class="border p-2 rounded w-full" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="kodeMK" class="block text-gray-700 font-semibold">Mata Kuliah</label>
                        <select name="kodeMK" id="kodeMK" class="border p-2 rounded w-full" required>
                            <option value="" disabled selected>Pilih Mata Kuliah</option>
                            @foreach($jadwals->groupBy('kodeMK') as $kodeMK => $jadwalsByKodeMK)
                                <option value="{{ $kodeMK }}" 
                                    data-kelas="{{ $jadwalsByKodeMK->pluck('kelas')->join(',') }}"
                                    data-kuota="{{ json_encode($kuotaData[$kodeMK] ?? []) }}">
                                    {{ $jadwalsByKodeMK->first()->matakuliah->namaMK }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="kelas" class="block text-gray-700 font-semibold">Kelas</label>
                        <select name="kelas" id="kelas" class="border p-2 rounded w-full" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="kuota" class="block text-gray-700 font-semibold">Sisa Kuota</label>
                        <input type="text" id="kuota" class="border p-2 rounded w-12 bg-gray-200" value="" disabled>
                    </div>

                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded w-full">Submit</button>
                </form>
            </div>
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
        document.addEventListener('DOMContentLoaded', function () {
            const mataKuliahSelect = document.getElementById('kodeMK');
            const kelasSelect = document.getElementById('kelas');
            const kuotaInput = document.getElementById('kuota');

            // Ketika mata kuliah dipilih
            mataKuliahSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const kelasData = selectedOption.getAttribute('data-kelas');
                const kuotaData = JSON.parse(selectedOption.getAttribute('data-kuota') || '{}');

                kelasSelect.innerHTML = '<option value="" disabled selected>Pilih Kelas</option>';
                kuotaInput.value = '';

                if (kelasData) {
                    const kelasList = kelasData.split(',');
                    kelasList.forEach(kelas => {
                        const option = document.createElement('option');
                        option.value = kelas;
                        option.textContent = kelas;
                        option.setAttribute('data-kuota', kuotaData[kelas] || 0);
                        kelasSelect.appendChild(option);
                    });
                }
            });
            kelasSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const kuota = selectedOption.getAttribute('data-kuota') || 0;
                kuotaInput.value = kuota; // Update kuota input
            });
        });
    </script>
</body>
</html>