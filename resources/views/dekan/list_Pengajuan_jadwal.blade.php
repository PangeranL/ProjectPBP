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
                    <span class="mr-4">Smith Wilson</span>
                    <img class="w-14 h-14 rounded-full" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
                </div>
            </div>
        </div>
    </div>

    <!-- Title Section -->
    <div class="container mt-3 mx-auto">
        <h1 class="text-3xl text-center font-bold">PENGAJUAN JADWAL KULIAH</h1>
    </div>

    <div class="container ml-12 mb-0 px-40 ">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $index => $jadwal)
                <tr class="border-b">
                    <td class="py-2 px-4 text-center ">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 text-center ">{{ $jadwal->kodeMK }}</td>
                    <td class="py-2 px-4 text-center ">{{ $jadwal->kelas }}</td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
