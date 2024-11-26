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
    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="bg-green-700 text-white p-4 rounded-lg shadow-md flex justify-between items-center">
            <h1 class="text-xl font-bold">UNIVERSITAS DIPONEGORO</h1>
            <div class="flex items-center">
                <span class="mr-4">Kim Dokja</span>
                <img class="w-10 h-10 rounded-full" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
            </div>
        </div>

        <!-- Tabs Navigation -->
        <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
            <nav class="flex space-x-4">
                <a href="{{ route('buat_irs') }}" class="{{ request()->is('buat_irs') ? 'text-green-700 font-semibold' : 'text-gray-600 hover:text-green-700' }}">Buat IRS</a>
                <a href="{{ route('irs') }}" class="{{ request()->is('irs') ? 'text-green-700 font-semibold' : 'text-gray-600 hover:text-green-700' }}">IRS</a>
                <a href="{{ route('khs') }}" class="{{ request()->is('khs') ? 'text-green-700 font-semibold' : 'text-gray-600 hover:text-green-700' }}">KHS</a>
            </nav>
        </div>

        <!-- Informasi Mahasiswa -->
        <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <p><strong>Nama:</strong> Kim Dokja</p>
                <p><strong>NIM:</strong> 11076120603764</p>
                <p><strong>Tahun Ajaran:</strong> 2024/2025</p>
                <p><strong>Semester:</strong> XX</p>
                <p><strong>IPK:</strong> 4.00</p>
                <p><strong>IPS:</strong> 4.00</p>
                <p><strong>Max Beban SKS:</strong> 24</p>
            </div>

            <!-- Pilihan Mata Kuliah -->
            <div class="flex">
                <div class="w-1/3 pr-4">
                    <select class="w-full p-2 border border-gray-300 rounded mb-4">
                        <option>Pilih Mata Kuliah Wajib</option>
                        <option>Pembelajaran Mesin - SMT 5 - PAI6065 (3 SKS)</option>
                        <option>Proyek Perangkat Lunak - SMT 5 - PAI6066 (3 SKS)</option>
                        <option>Komputasi Tersebar Dan Pararel - SMT 5 - PAI6067 (3 SKS)</option>
                    </select>

                    <ul class="space-y-2">
                        <li class="bg-gray-100 p-4 rounded shadow-md flex justify-between items-center">
                            <div>
                                <p>Pembelajaran Mesin</p>
                                <p>SMT 5 - PAI6065 (3 SKS)</p>
                            </div>
                            <button class="text-green-700">👁️</button>
                        </li>
                        <li class="bg-gray-100 p-4 rounded shadow-md flex justify-between items-center">
                            <div>
                                <p>Pembelajaran Mesin</p>
                                <p>SMT 5 - PAI6065 (3 SKS)</p>
                            </div>
                            <button class="text-green-700">👁️</button>
                        </li>
                    </ul>

                    <select class="w-full p-2 border border-gray-300 rounded mt-4">
                        <option>Pilih Mata Kuliah Perbaikan</option>
                        <option>Logika Informatika - SMT 1 - PAI6050 (3 SKS)</option>
                    </select>

                    <select class="w-full p-2 border border-gray-300 rounded mt-4">
                        <option>Pilih Mata Kuliah Pilihan</option>
                        <option>Teori Bahasa Dan Otomata - SMT 7 - PAI6068 (3 SKS)</option>
                    </select>

                    <button class="bg-green-700 text-white w-full p-2 rounded mt-4">Ajukan IRS</button>
                </div>
                
                <!-- Jadwal Kuliah -->
                <div class="w-2/3">
                    <table class="w-full table-fixed border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 p-2">Waktu</th>
                                <th class="border border-gray-300 p-2">Senin</th>
                                <th class="border border-gray-300 p-2">Selasa</th>
                                <th class="border border-gray-300 p-2">Rabu</th>
                                <th class="border border-gray-300 p-2">Kamis</th>
                                <th class="border border-gray-300 p-2">Jumat</th>
                                <th class="border border-gray-300 p-2">Sabtu</th>
                                <th class="border border-gray-300 p-2">Minggu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 p-2">07:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">08:00</td>
                                <td class="border border-gray-300 p-2 bg-green-300">Pembelajaran Mesin - Kelas A <br> 09:00-11:15</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">09:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">10:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">11:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">12:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">13:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">14:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">15:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">16:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">17:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">18:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">19:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">20:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">21:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">22:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 p-2">23:00</td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                                <td class="border border-gray-300 p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 bg-green-700 text-white p-4 rounded-lg shadow-md text-center">
            <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
        </div>
    </div>
</body>
</html>
