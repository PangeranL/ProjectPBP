<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isian Rencana Semester (IRS)</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100">

    <!-- Container Utama -->
    <div class="container mx-auto p-6">

        <!-- Header -->
        <div class="bg-green-700 text-white p-4 rounded-lg shadow-md flex justify-between items-center">
            <h1 class="text-xl font-bold">UNIVERSITAS DIPONEGORO</h1>
            <div class="flex items-center">
                <span class="mr-4">Kim Dokja</span>
                <img class="w-10 h-10 rounded-full" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="User Avatar">
            </div>
        </div>

        <!-- Navigasi Tabs -->
        <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
            <nav class="flex space-x-4">
                <a href="{{ route('buat_irs') }}" class="{{ request()->is('buat_irs') ? 'text-green-700 font-semibold' : 'text-gray-600 hover:text-green-700' }}">Buat IRS</a>
                <a href="{{ route('irs') }}" class="{{ request()->is('irs') ? 'text-green-700 font-semibold' : 'text-gray-600 hover:text-green-700' }}">IRS</a>
                <a href="{{ route('khs') }}" class="{{ request()->is('khs') ? 'text-green-700 font-semibold' : 'text-gray-600 hover:text-green-700' }}">KHS</a>
            </nav>
        </div>

        <!-- Isian Rencana Semester (IRS) -->
        <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-700 mb-4">Isian Rencana Semester (IRS)</h2>
            <div class="space-y-4">
                <!-- Semester Items -->
                @foreach($semesters as $semester)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold">{{ $semester['title'] }}</h3>
                            <p>Jumlah SKS: {{ $semester['sks'] }}</p>
                        </div>
                        <button class="text-green-700 text-xl">+</button>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 bg-green-700 text-white p-4 rounded-lg shadow-md text-center">
            <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
        </div>
    </div>
</body>
</html>
