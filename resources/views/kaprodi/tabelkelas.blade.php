<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Buat Jadwal Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">

    <style>
        table,
        th,
        td {
            border: 1px solid #000000;
        }

        /* Scrollable content */
        .scrollable-content {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        /* Scrollable table */
        .scrollable-table {
            max-height: 500px;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-gray-100 overflow-hidden">

    <div class="flex flex-col md:flex-row">

        <!-- Sidebar -->
        <div class="w-full md:w-1/4 h-full md:h-screen p-5 flex flex-col" style="background-color: #80AF81">
            <div class="flex">
                <img src="/images/logo.png" class="w-20 h-20 object-cover">
                <div class="flex flex-col items-center justify-center">
                    <div class="text-4 text-white text-2xl font-bold">SIKAT UNDIP</div>
                    <div class="h-[9px] border w-full bg-black"></div>
                    <div class="text-white text-xs mb-8 text-center">Sistem Informasi Kuliah Akademik Terpadu<br>Universitas Diponegoro</div>
                </div>
            </div>

            <nav class="space-y-4 text-white text-lg">
                <a href="/Dashboard" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/dashboard.png" class="w-6 h-6">
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/profil.png" class="w-6 h-6">
                    <span>Profil</span>
                </a>
                <a href="/kaprodi/inputMK" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" class="w-6 h-6">
                    <span>Input Mata Kuliah</span>
                </a>
                <a href="/kaprodi/inputJD" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" class="w-6 h-6">
                    <span>Input Jadwal Kuliah</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 md:p-8">

            <div class="text-3xl font-semibold mb-8" style="color: #508D4E">Tabel Kelas</div>

            <div class="p-6 rounded-lg mb-8 h-full" style="background-color: #D6EFD8; height: auto">

                <!-- Semester Select and Add Button -->
                <div class="flex justify-between items-center mb-6">
                    <div class="font-semibold flex items-center" style="color: #508D4E">
                        <label for="semester" class="mr-2">Semester</label>
                        <select name="semester" id="semester" class="w-1/3 p-2 border rounded-md">
                            <option value="">1</option>
                            <option value="">2</option>
                        </select>
                    </div>

                    <a href='/kaprodi/inputJD/create'
                        class="bg-green-800 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full" style="margin-top: 10px">TAMBAH</a>
                </div>

                <!-- Form Filter -->
                <form action="{{ route('kaprodi.filter-jadwal') }}" method="GET" class="mb-6">
                    <label for="kodeMK" class="mr-2 font-semibold" style="color: #508D4E">Filter berdasarkan Kode MK:</label>
                    <input type="text" name="kodeMK" id="kodeMK" class="p-2 border rounded-md" placeholder="Masukkan Kode MK" required>
                    <button type="submit" class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        Filter
                    </button>
                </form>

                <!-- Scrollable Table -->
                <div class="scrollable-table">
                    <table class="w-full table-auto border-collapse text-center mt-4">
                        <thead class="bg-teal-700" style="color: #00000">
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">kodeMK</th>
                                <th class="border px-4 py-2">Kelas</th>
                                <th class="border px-4 py-2">Kuota</th>
                                <th class="border px-4 py-2">Hari</th>
                                <th class="border px-4 py-2">Waktu Mulai</th>
                                <th class="border px-4 py-2">Waktu Selesai</th>
                                <th class="border px-4 py-2">Ruang</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $key => $j)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $j->kodeMK }}</td>
                                    <td>{{ $j->kelas }}</td>
                                    <td>{{ $j->kuota }}</td>
                                    <td>{{ $j->hari }}</td>
                                    <td>{{ $j->mulai }}</td>
                                    <td>{{ $j->selesai }}</td>
                                    <td>{{ $j->ruang }}</td>
                                    <td>{{ $j->status }}</td>
                                    <td class="flex flex-col items-center space-y-2">
                                        <!-- Tombol Edit -->
                                        <button type="button"
                                            onclick="openModal('{{ $j->id }}', '{{ $j->kodeMK }}', '{{ $j->thnAjar }}', '{{ $j->kelas }}', '{{ $j->hari }}', '{{ $j->ruang }}', '{{ $j->kuota }}', '{{ $j->mulai }}', '{{ $j->selesai }}')"
                                            class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-1 px-3 rounded">
                                            Edit
                                        </button>

                                        <!-- Tombol Delete -->
                                        <form action="/kaprodi/deleteJadwal/{{ $j->id }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-3 rounded"
                                                onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-full max-w-2xl relative">
            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-600 hover:text-gray-800">
                ✖
            </button>
            <h2 class="text-2xl font-semibold mb-4" style="color: #508D4E">Edit Jadwal</h2>
            <!-- Form Edit -->
            <form action="#" id="editForm" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" id="id" name="id">

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="kodeMK" class="block font-semibold">Kode MK:</label>
                        <input type="text" id="kodeMK" name="kodeMK" class="w-full p-2 border rounded-md">
                    </div>
                    <div>
                        <label for="thnAjar" class="block font-semibold">Tahun Ajaran:</label>
                        <input type="text" id="thnAjar" name="thnAjar" class="w-full p-2 border rounded-md">
                    </div>
                    <div>
                        <label for="kelas" class="block font-semibold">Kelas:</label>
                        <input type="text" id="kelas" name="kelas" class="w-full p-2 border rounded-md">
                    </div>
                    <div>
                        <label for="ruang" class="block font-semibold">Ruang:</label>
                        <input type="text" id="ruang" name="ruang" class="w-full p-2 border rounded-md">
                    </div>
                    <div>
                        <label for="hari" class="block font-semibold">Hari:</label>
                        <input type="text" id="hari" name="hari" class="w-full p-2 border rounded-md">
                    </div>
                    <div>
                        <label for="kuota" class="block font-semibold">Kuota:</label>
                        <input type="text" id="kuota" name="kuota" class="w-full p-2 border rounded-md">
                    </div>
                    <div>
                        <label for="mulai" class="block font-semibold">Waktu Mulai:</label>
                        <input type="time" id="mulai" name="mulai" class="w-full p-2 border rounded-md">
                    </div>
                    <div>
                        <label for="selesai" class="block font-semibold">Waktu Selesai:</label>
                        <input type="time" id="selesai" name="selesai" class="w-full p-2 border rounded-md">
                    </div>
                </div>

                <button type="submit"
                    class="bg-green-800 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mt-4 w-full">
                    Simpan
                </button>
            </form>
        </div>
    </div>

    <script>
        function openModal(id, kodeMK, thnAjar, kelas, hari, ruang, kuota, mulai, selesai) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('id').value = id;
            document.getElementById('kodeMK').value = kodeMK;
            document.getElementById('thnAjar').value = thnAjar;
            document.getElementById('kelas').value = kelas;
            document.getElementById('hari').value = hari;
            document.getElementById('ruang').value = ruang;
            document.getElementById('kuota').value = kuota;

            // Pastikan format waktu HH:MM
            let mulaiFormatted = mulai ? mulai.substring(0, 5) : '';
            let selesaiFormatted = selesai ? selesai.substring(0, 5) : '';
            
            document.getElementById('mulai').value = mulaiFormatted;
            document.getElementById('selesai').value = selesaiFormatted;

            document.getElementById('editForm').action = "/kaprodi/updateJadwal/" + id;
        }
        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
}
    </script>
</body>

</html>
