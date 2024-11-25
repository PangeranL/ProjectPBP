<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <style>
        /* Mengatur tinggi body agar mengambil seluruh layar dan membuat konten utama fleksibel */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1; /* Membuat konten utama fleksibel */
        }
    </style>
</head>
<body class="bg-green-100">
    <div class="content">
        <div class="container mx-auto p-6">
            <div class="bg-green-700 text-white p-4 rounded-lg shadow-md">
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-xl font-bold">UNIVERSITAS DIPONEGORO</h1>
                    </div>
                    <div class="flex items-center">
                        <span class="mr-4">Kim Dokja</span>
                        <img class="w-10 h-10 rounded-full" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
                    </div>
                </div>
            </div>

            <!-- Informasi Mahasiswa -->
            <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <img class="w-16 h-16 rounded-full mr-4" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
                    <div>
                        <h2 class="text-xl font-bold">Kim Dokja</h2>
                        <p>NIM: 11076120603764</p>
                    </div>
                </div>
            </div>

            <!-- Status Akademik -->
            <div class="grid grid-cols-3 gap-4 mt-4">
                <!-- Status Akademik -->
                <div class="col-span-2 bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-2">Status Akademik</h3>
                    <p>Informasi selengkapnya mengenai status akademik silakan menghubungi fakultas masing-masing.</p>
                    <div class="mt-4">
                        <p><strong>Dosen Wali:</strong> Dr. RioDjaja, S.T., M.Cs.</p>
                        <p><strong>NIP:</strong> 5363270261653938</p>
                    </div>
                    <div class="flex justify-between mt-4">
                        <p><strong>Semester Akademik Sekarang:</strong> 2024/2025 Ganjil</p>
                        <p><strong>Semester Studi:</strong> 5</p>
                        <p><strong>Status Akademik:</strong> <span class="text-green-600 font-bold">AKTIF</span></p>
                    </div>
                    <!-- Button Akademik di Kiri -->
                    <div class="mt-6 flex justify-start">
                        <button onclick="window.location.href='{{ url('/buat_irs') }}'" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 3a1 1 0 00-.707.293l-6 6a1 1 0 001.414 1.414L4 10.414V16a1 1 0 001 1h3a1 1 0 001-1v-3h2v3a1 1 0 001 1h3a1 1 0 001-1v-5.586l.293.293a1 1 0 001.414-1.414l-6-6A1 1 0 0010 3z" />
                            </svg>
                            Akademik
                        </button>
                    </div>
                </div>

                <!-- Prestasi Akademik -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold mb-2">Prestasi Akademik</h3>
                    <div class="flex items-center justify-center">
                        <div class="text-center">
                            <p class="text-4xl font-bold">4.0</p>
                            <p>Prestasi Akademik</p>
                            <p>SKS: 120</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-green-700 text-white p-4 shadow-md text-center">
        <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
    </div>
</body>
</html>