<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center flex flex-col justify-between h-screen" style="background-image: url('/images/UNDIP_2024.jpg'); background-attachment: fixed;">
    <div class="h-20 flex items-center px-8 text-white fixed w-full z-10">
        <img src="{{ asset('images/UNDIP.png') }}" alt="Diponegoro University Logo" class="w-16 mr-2">
        <h1 class="text-xl">DIPONEGORO UNIVERSITY</h1>
    </div>
    <div class="flex justify-center items-center flex-1 mt-20 pb-20">
        <div class="bg-green-800 p-10 rounded-lg shadow-lg max-w-lg w-full">
            <form action="" method="post">
                @csrf
                <div class="mb-4">
                    <label for="nik" class="block text-white mb-1">NIK</label>
                    <input type="text" id="nik" name="nik" pattern="[0-9]{16}" required class="w-full p-2 border border-white rounded bg-transparent text-white">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-white mb-1">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required class="w-full p-2 border border-white rounded bg-transparent text-white">
                </div>
                <div class="mb-4">
                    <label for="dob" class="block text-white mb-1">TTL</label>
                    <input type="date" id="dob" name="dob" required class="w-full p-2 border border-white rounded bg-transparent text-white">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-white mb-1">Nomor HP</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" required class="w-full p-2 border border-white rounded bg-transparent text-white">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-white mb-1">Alamat</label>
                    <input type="text" id="address" name="address" required class="w-full p-2 border border-white rounded bg-transparent text-white">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-white mb-1">Email</label>
                    <input type="email" id="email" name="email" required class="w-full p-2 border border-white rounded bg-transparent text-white">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-white mb-1">Password</label>
                    <input type="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!]).{8,}" name="password" required class="w-full p-2 border border-white rounded bg-transparent text-white">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-white mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!]).{8,}" name="password_confirmation" required class="w-full p-2 border border-white rounded bg-transparent text-white">
                </div>
                <button type="submit" class="w-full h-10 bg-green-600 text-white rounded hover:bg-green-500 transition">Daftar</button>
            </form>
            <p class="mt-4 text-white text-sm">Sudah memiliki akun? <a class="text-green-400 hover:text-green-300">Login sekarang!</a></p>
        </div>
    </div>
    <div class="text-white h-10 flex items-center pl-4 justify-left fixed bottom-0 w-full">
        <h3 class="text-center">TIM IT SIKAT © 2024 UNDIP, All Right Reserved.</h3>
    </div>
</body>
</html>
