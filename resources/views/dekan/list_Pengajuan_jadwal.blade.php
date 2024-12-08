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
    </div>

    <!-- Title Section -->
    <div class="container mt-3 mx-auto">
        <h1 class="text-3xl text-center font-bold">PENGAJUAN JADWAL KULIAH</h1>
    </div>

    <div class="container ml-12 mb-0 px-40">
        <a href="/dashboard/dekan" class="text-lg font-semibold text-gray-700">< Kembali</a>
    </div>

    <!-- Table Wrapper -->
    <div class="bg-[#D9D9D9] rounded-lg shadow-md p-4 mb-4 w-3/4 mx-auto mt-6">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-[#508D4E] text-white">
                <tr>
                    <th class="py-2 px-4 text-center">No.</th>
                    <th class="py-2 px-4 text-center">Kode Mata Kuliah</th>
                    <th class="py-2 px-4 text-center">Kelas</th>
                    <th class="py-2 px-4 text-center">Ruang</th>
                    <th class="py-2 px-4 text-center">Hari</th>
                    <th class="py-2 px-4 text-center">Mulai</th>
                    <th class="py-2 px-4 text-center">Selesai</th>
                    <th class="py-2 px-4 text-center">Status</th>
                    <th class="py-2 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $index => $jadwal)
                <tr class="border-b">
                    <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 text-center">{{ $jadwal->kodeMK }}</td>
                    <td class="py-2 px-4 text-center">{{ $jadwal->kelas }}</td>
                    <td class="py-2 px-4 text-center">{{ $jadwal->ruang }}</td>
                    <td class="py-2 px-4 text-center">{{ $jadwal->hari }}</td>
                    <td class="py-2 px-4 text-center">{{ $jadwal->mulai }}</td>
                    <td class="py-2 px-4 text-center">{{ $jadwal->selesai }}</td>
                    <td class="py-2 px-4 text-center">{{ ucfirst($jadwal->status) }}</td>
                    <td class="py-2 px-4 text-center">
                        <form action="{{ route('jadwal.updateStatus', ['id' => $jadwal->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT') <!-- Menggunakan metode PUT -->
                            <input type="hidden" name="status" value="Disetujui">
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Setuju</button>
                        </form>
                        <form action="{{ route('jadwal.updateStatus', ['id' => $jadwal->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT') <!-- Menggunakan metode PUT -->
                            <input type="hidden" name="status" value="Ditolak">
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Tolak</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
