<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100">
    <!-- Header -->
    <div class="bg-green-700 h-20 flex justify-between items-center px-8 text-white fixed w-full top-0">
        <div class="flex items-center">
            <img src="{{ asset('images/UNDIP.png') }}" alt="Universitas Diponegoro" class="w-14 mr-2">
            <h1 class="text-xl">DIPONEGORO UNIVERSITY</h1>
        </div>
        <div class="relative">
            <button onclick="toggleDropdown()" class="flex items-center focus:outline-none">
                <span class="mr-4">Kim Dokja</span>
                <img class="w-10 h-10 rounded-full" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
            </button>
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded shadow-lg">
                <a type="submit" class="block w-full text-left px-4 py-2 hover:bg-green-100" href="/logout">Logout</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="mt-24 px-8">
        <!-- Pesan Error -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Pesan Sukses/Gagal -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulir Edit -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold mb-4">Edit IRS</h3>
            <form action="{{ route('updateIRS', ['nim' => $irs->nim, 'smt' => $irs->smt]) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Mata Kuliah -->
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

                <!-- Kelas -->
                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 font-semibold">Kelas</label>
                    <select name="kelas" id="kelas" class="border p-2 rounded w-full" required>
                        <option value="" disabled selected>Pilih Kelas</option>
                    </select>
                </div>

                <!-- Kuota -->
                <div class="mb-4">
                    <label for="kuota" class="block text-gray-700 font-semibold">Sisa Kuota</label>
                    <input type="text" id="kuota" class="border p-2 rounded w-full bg-gray-200" value="" disabled>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="bg-green-700 text-white py-2 px-4 rounded w-full">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-green-700 text-white h-16 flex items-center justify-center fixed bottom-0 w-full">
        <h3 class="text-center">TIM IT SIKAT © 2024 UNDIP, All Right Reserved.</h3>
    </div>

    <!-- Script -->
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

        // Handle Mata Kuliah dan Kelas
        document.addEventListener('DOMContentLoaded', function () {
            const mataKuliahSelect = document.getElementById('kodeMK');
            const kelasSelect = document.getElementById('kelas');
            const kuotaInput = document.getElementById('kuota');

            mataKuliahSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const kelasData = selectedOption.getAttribute('data-kelas');
                const kuotaData = JSON.parse(selectedOption.getAttribute('data-kuota') || '{}');

                // Reset kelas dan kuota
                kelasSelect.innerHTML = '<option value="" disabled selected>Pilih Kelas</option>';
                kuotaInput.value = '';

                // Update kelas berdasarkan mata kuliah
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
