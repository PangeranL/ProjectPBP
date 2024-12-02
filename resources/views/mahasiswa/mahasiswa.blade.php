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

            <!-- Informasi Mahasiswa -->
            <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <img class="w-16 h-16 rounded-full mr-4" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
                    <div>
                        <h2 class="text-xl font-bold">Ganz</h2>
                        <p>NIM: 24160122131000</p>
                    </div>
                </div>
            </div>

            <!-- Daftar Mahasiswa -->
            <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">Informasi Mahasiswa</h2>
                <div class="overflow-x-auto">
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($mahasiswa as $mhs)
                            <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow-md">
                                <!-- Informasi Utama -->
                                <div class="flex-1">
                                    <p><strong>NIM:</strong> {{ $mhs->nim }}</p>
                                    <p><strong>Nama:</strong> {{ $mhs->name }}</p>
                                    <p><strong>Email:</strong> {{ $mhs->email }}</p>
                                    <p><strong>Alamat:</strong> {{ $mhs->address }}</p>
                                </div>
                                <!-- Informasi Status -->
                                <div class="flex-1">
                                    <p><strong>Status:</strong> <span class="font-bold text-green-600">{{ ucfirst($mhs->status) }}</span></p>
                                    <p><strong>Semester:</strong> {{ $mhs->smt }}</p>
                                    <p><strong>Tahun Masuk:</strong> {{ $mhs->thnmasuk }}</p>
                                    <p><strong>Dosen Wali:</strong> {{ $mhs->nidnWali }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="container mx-auto w-1/2 ml-1 p-7">
                <div class="bg-[#80AF81] rounded-lg shadow-md p-6">
                    <h1 class="text-2xl font-bold text-white mb-4">LAYANAN AKADEMIK</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- List Ruang Kuliah -->
                        <button onclick="window.location.href='{{ url('/herregistrasi')}}'" class="text-sm font-bold text-white bg-green-600 py-2 rounded-lg w-full flex items-center space-x-3">
                            <!-- Logo Gambar di sebelah kiri -->
                            <img src="{{ asset('images/list.png') }}" alt="Logo" class="w-12 h-12">
                            <!-- Teks nempel kanan -->
                            <span class="mr-2">Her Registrasi</span>
                        </button>
                        <a class="text-sm font-bold text-white bg-green-600 py-2 rounded-lg w-full flex items-center pl-5 space-x-3" href="{{ route('irsan', ['nim' => $mhs->nim, 'smt' => $mhs->smt]) }}">Buat IRS</a>
                    </div>
                </div>
            </div>
                <!-- Placeholder Tengah -->
                <div class="w-1/2"></div>

                <!-- Kolom Herregistrasi -->
                {{-- <div class="w-1/4 bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center">
                    <h3 class="text-lg font-bold mb-2">Herregistrasi</h3>
                    <form action="{{ url('/herregistrasi') }}" method="POST" class="w-full text-center">
                        @csrf
                        <label for="status_akademik" class="block mb-2">Status Akademik:</label>
                        <select name="status_akademik" id="status_akademik" class="border p-2 rounded mb-4 w-full">
                            <option value="aktif">Aktif</option>
                            <option value="cuti">Cuti</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                            Perbarui Status
                        </button>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-green-700 text-white container mx-auto p-6 rounded-lg shadow-md text-center">
        <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
    </div>
</body>
</html>
