<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Edit Jadwal Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 overflow-hidden">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 h-full md:h-screen p-5 flex flex-col" style="background-color: #80AF81">
            <div class="flex">
                <img src="/images/logo.png" class="w-20 h-20 object-cover">
                <div class="flex flex-col items-center justify-center">
                    <div class="text-white text-2xl font-bold">SIKAT UNDIP</div>
                    <div class="text-white text-xs mb-8 text-center">Sistem Informasi Kuliah Akademik Terpadu</div>
                </div>
            </div>
            <nav class="space-y-4 text-white text-lg">
                <a href="/Dashboard" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <span>Dashboard</span>
                </a>
                <a href="/kaprodi/tabelkelas" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <span>Tabel Jadwal Kuliah</span>
                </a>
                <a href="/kaprodi/tabelmatkul" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <span>Tabel Mata Kuliah</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 md:p-8">
            <div class="text-3xl font-semibold mb-8" style="color: #508D4E">Edit Jadwal Kuliah</div>

            <div class="p-6 rounded-lg mb-8" style="background-color: #D6EFD8;">
                <!-- Form Edit Jadwal -->
                <form action="{{ route('kaprodi.updateJadwal', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="kodeMK" class="block font-semibold">Kode MK:</label>
                            <input type="text" id="kodeMK" name="kodeMK" value="{{ old('kodeMK', $jadwal->kodeMK) }}" class="w-full p-2 border rounded-md">
                        </div>
                        <div>
                            <label for="thnAjar" class="block font-semibold">Tahun Ajaran:</label>
                            <input type="text" id="thnAjar" name="thnAjar" value="{{ old('thnAjar', $jadwal->thnAjar) }}" class="w-full p-2 border rounded-md">
                        </div>
                        <div>
                            <label for="kelas" class="block font-semibold">Kelas:</label>
                            <input type="text" id="kelas" name="kelas" value="{{ old('kelas', $jadwal->kelas) }}" class="w-full p-2 border rounded-md">
                        </div>
                        <div>
                            <label for="ruang" class="block font-semibold">Ruang:</label>
                            <input type="text" id="ruang" name="ruang" value="{{ old('ruang', $jadwal->ruang) }}" class="w-full p-2 border rounded-md">
                        </div>
                        <div>
                            <label for="hari" class="block font-semibold">Hari:</label>
                            <input type="text" id="hari" name="hari" value="{{ old('hari', $jadwal->hari) }}" class="w-full p-2 border rounded-md">
                        </div>
                        <div>
                            <label for="kuota" class="block font-semibold">Kuota:</label>
                            <input type="number" id="kuota" name="kuota" value="{{ old('kuota', $jadwal->kuota) }}" class="w-full p-2 border rounded-md">
                        </div>
                        <div>
                            <label for="mulai" class="block font-semibold">Waktu Mulai:</label>
                            <input type="time" id="mulai" name="mulai" value="{{ old('mulai', $jadwal->mulai) }}" class="w-full p-2 border rounded-md">
                        </div>
                        <div>
                            <label for="selesai" class="block font-semibold">Waktu Selesai:</label>
                            <input type="time" id="selesai" name="selesai" value="{{ old('selesai', $jadwal->selesai) }}" class="w-full p-2 border rounded-md">
                        </div>
                    </div>

                    <button type="submit" class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mt-4 w-full">
                        Simpan Perubahan
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
