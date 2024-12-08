<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pengajuan Ruang Kuliah</title>
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
    </style>
</head>

<body class="bg-[#D6EFD8]">
    <!-- Header -->
    <header class="bg-[#508D4E] text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">UNIVERSITAS DIPONEGORO</h1>
        <div class="flex items-center">
            <span class="mr-4 font-semibold">Smith Welson</span>
            <img class="w-12 h-12 rounded-full" src="{{ asset('images/SW2.png')}}" alt="Avatar Pengguna">
        </div>
    </header>

    <!-- Konten Utama -->
    <main>
        <!-- Judul -->
        <div class="flex items-center justify-between px-6 mt-10">
            <a href="/bagianAkademik/list_ruang_kuliah" class="text-lg font-semibold ml-5 text-gray-700">
                &lt; Kembali
            </a>
            <h1 class="text-3xl font-bold text-center flex-grow mr-16">PENGAJUAN RUANG KULIAH</h1>
            <button onclick="toggleModal()" class="text-lg font-semibold mr-5 text-gray-700">Request &gt;</button>
        </div>

        <!-- Tabel -->
        <div class="bg-[#D9D9D9] rounded-lg shadow-md p-2 mb-2 w-3/4 mt-10 mx-auto">
            <!-- Header Tabel -->
            <div class="flex justify-between items-center text-black font-semibold text-sm">
                <div class="w-1/4 text-center">Departemen</div>
                <div class="w-1/4 text-center">Kode Ruang</div>
                <div class="w-1/4 text-center">Kuota</div>
                <div class="w-1/4 text-center">Status</div>
            </div>
        </div>
        
        <div class="bg-[#ffffff] rounded-lg shadow-md p-2 w-3/4 mb-3 mt-7 mx-auto">
            <!-- Data Tabel -->
            @foreach ($reqRuangs as $reqRuang)
            <div class="flex justify-between items-center text-black text-sm py-2">
                <div class="w-1/4 mt-3 text-center">{{ $reqRuang->prodi }}</div>
                <div class="w-1/4 mt-3 text-center">{{ $reqRuang->nama }}</div>
                <div class="w-1/4 mt-3 text-center">{{ $reqRuang->kuota }}</div>
                <div class="w-1/4 mt-3 text-center">
                    <span class="px-2 py-1 container rounded-lg text-sm font-bold
                        {{ strtolower($reqRuang->status) == 'pending' ? 'bg-yellow-200 text-yellow-800' : '' }}
                        {{ strtolower($reqRuang->status) == 'diterima' ? 'bg-green-500 text-white' : '' }}
                        {{ strtolower($reqRuang->status) == 'ditolak' ? 'bg-red-500 text-white' : '' }}">
                        {{ ucfirst($reqRuang->status) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#508D4E] text-white text-center py-3">
        <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
    </footer>

    <!-- Modal Request -->
    <div id="requestModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg w-1/3">
            <h2 class="text-xl font-semibold mb-4">Request Ruang Kuliah</h2>
            <form action="{{ route('ruang.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="ruangKuliah" class="block text-sm font-medium text-gray-700">Pilih Ruang Kuliah</label>
                    <select id="ruangKuliah" name="ruangKuliah" class="mt-1 block w-full border-gray-300 rounded-md">
                        @foreach ($ruangs as $ruang)
                        <option value="{{ $ruang->nama }}">{{ $ruang->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota</label>
                    <select id="kuota" name="kuota" class="mt-1 block w-full border-gray-300 rounded-md">
                        @foreach ($kuotas as $kuota)
                        <option value="{{ $kuota->Kuota_kelas }}">{{ $kuota->Kuota_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="prodi" class="block text-sm font-medium text-gray-700">Prodi</label>
                    <select id="prodi" name="prodi" class="mt-1 block w-full border-gray-300 rounded-md">
                        <option value="Informatika">Informatika</option>
                    </select>
                </div>
                <div class="flex justify-end gap-4">
                    <button type="button" onclick="toggleModal()" class="bg-gray-400 text-white px-4 py-2 rounded-md">
                        Cancel
                    </button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Modal -->
    <script>
        function toggleModal() {
            const modal = document.getElementById('requestModal');
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>
