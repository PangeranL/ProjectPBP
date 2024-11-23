<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center flex flex-col justify-between h-screen" style="background-image: url('/images/UNDIP_2024.jpg'); background-attachment: fixed">
    <div class="bg-green-700 h-20 flex justify-between items-center px-8 text-white fixed w-full top-0">
        <div class="flex items-center">
            <img src="{{ asset('images/UNDIP.png') }}" alt="Universitas Diponegoro" class="w-14 mr-2">
            <h1 class="text-xl">DIPONEGORO UNIVERSITY</h1>
        </div>
    </div>

    <div class="mt-32">
        <div class="bg-transparent p-6 rounded-lg shadow-md max-w-lg mx-auto text-3xl">
            <h3 class="text-center font-bold mb-4">Select Your Role</h3>
            <form method="POST" action="{{ route('handleRoleSelection') }}">
                @csrf
                <div class="grid place-items-center">
                    @foreach($roles as $role)
                        <button type="submit" name="role" value="{{ $role->role }}" class="bg-green-700 text-white py-2 px-4 rounded shadow mb-5">
                            {{ $role->role }}
                        </button>
                    @endforeach
                </div>
            </form>
        </div>
    </div>

    <div class="bg-green-700 text-white h-16 flex items-center justify-center fixed bottom-0 w-full">
        <h3 class="text-center">TIM IT SIKAT © 2024 UNDIP, All Right Reserved.</h3>
    </div>
</body>
</html>
