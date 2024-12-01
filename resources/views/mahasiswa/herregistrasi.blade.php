<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
    </style>
</head>
<body class="bg-green-100">
    <div class="content">
        <div class="container mx-auto p-6">
            <!-- Header -->
            <div class="bg-green-700 text-white p-4 rounded-lg shadow-md">
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-xl font-bold">UNIVERSITAS DIPONEGORO</h1>
                    </div>
                    <div class="flex items-center">
                        <span class="mr-4">Ganz</span>
                        <img class="w-10 h-10 rounded-full" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
                    </div>
                </div>
            </div>

            <!-- Daftar Mahasiswa dan Status -->
            <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Registrasi Mahasiswa</h2>

                <div class="mt-5 flex space-x-4">
                    <!-- Form untuk Mengubah Status Mahasiswa -->
                    <form action="{{ route('herregistrasi.update') }}" method="POST" class="flex flex-col space-y-4">
                        @csrf
                        <div>
                            <label for="nim" class="block font-medium">NIM:</label>
                            <input type="text" name="nim" id="nim" class="border p-2 rounded w-full" placeholder="Masukkan NIM" required>
                        </div>
                        <div>
                            <label for="status" class="block font-medium">Status:</label>
                            <select name="status" id="status" class="border p-2 rounded w-full" required>
                                <option value="aktif">Aktif</option>
                                <option value="cuti">Cuti</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                                Update Status
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Menampilkan Pesan Sukses -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Berhasil!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>

    <!-- Tombol Kembali ke Dashboard -->
    <a href="{{ route('dashboard') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Kembali ke Dashboard
    </a>
    @endif

    <!-- Footer -->
    <div class="bg-green-700 text-white p-4 shadow-md text-center">
        <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
    </div>
</body>
</html>
