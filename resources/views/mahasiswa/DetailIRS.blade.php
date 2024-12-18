<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail IRS</title>
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
    <div class="mt-24 px-8">
        <h2 class="text-lg font-bold mb-4">Daftar IRS untuk NIM: {{ $nim }}, Semester: {{ $smt }}</h2>
        <div class="bg-white p-6 rounded-lg shadow-md pb-20">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Kode Mata Kuliah</th>
                        <th class="border px-4 py-2">Nama Mata Kuliah</th>
                        <th class="border px-4 py-2">Kelas</th>
                        <th class="border px-4 py-2">Ruang</th>
                        <th class="border px-4 py-2">Hari</th>
                        <th class="border px-4 py-2">Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($isi as $irs)
                        <tr>
                            <td class="border px-4 py-2">{{ $irs->kodeMK }}</td>
                            <td class="border px-4 py-2">{{ $irs->jadwal->matakuliah->namaMK }}</td>
                            <td class="border px-4 py-2">{{ $irs->kelas }}</td>
                            <td class="border px-4 py-2">{{ $irs->ruang }}</td>
                            <td class="border px-4 py-2">{{ $irs->jadwal->hari }}</td>
                            <td class="border px-4 py-2">{{ $irs->jadwal->mulai }}-{{ $irs->jadwal->selesai }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data IRS.</td>
                        </tr>
                    @endforelse
                        <tr>
                            <td class="border px-4 py-2 font-bold">Total SKS : {{ $totalSKS }}</td>
                        </tr>
                </tbody>
            </table>
            <div class="flex justify-end mt-5">
                <a class="bg-green-900 justify-center text-white px-4 py-2 rounded shadow mb-5 w-25 mr-5" href="{{ route('downloadIRS', ['nim' => $nim, 'smt' => $smt]) }}">Download</a>
                <a class="bg-green-700 justify-center text-white px-4 py-2 rounded shadow mb-5 w-22" href="{{ route('lihatIRS') }}">Kembali</a>
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
    </script>
</body>
</html>