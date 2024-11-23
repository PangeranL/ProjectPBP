<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center flex flex-col justify-between h-screen" style="background-image: url('/images/UNDIP_2024.jpg'); background-attachment: fixed">
    <div class="bg-green-700 h-16 flex items-center px-8 text-white fixed w-full z-10">
        <img src="{{ asset('images/UNDIP.png') }}" alt="Universitas Diponegoro" class="w-14 mr-2">
        <h1 class="text-xl">DIPONEGORO UNIVERSITY</h1>
    </div>
    <div class="flex justify-center items-center flex-1 mt-20 pb-20">
        <div class="bg-green-800 p-10 rounded-lg shadow-lg max-w-xs w-30">
            <img src="{{ asset('images/UNDIP.png') }}" alt="Universitas Diponegoro" class="w-40 mb-4 ml-10  ">
            @if($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/" method="POST">
                @csrf
                <h2 class="text-white text-lg mb-2">Username</h2>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full p-2 mb-4 border border-white rounded focus:border-green-500 bg-transparent text-white placeholder-grey" placeholder="Email">
                <h2 class="text-white text-lg mb-2">Password</h2>
                <input type="password" name="password" class="w-full p-2 mb-4 border border-white rounded focus:border-green-500 bg-transparent text-white placeholder-grey" placeholder="Password">
                <button type="submit" class="w-full h-10 bg-green-600 text-white rounded hover:bg-green-500 transition">Login</button>
            </form> 
        </div>
    </div>
    <div class="bg-green-700 text-white h-16 flex items-center justify-center fixed bottom-0 w-full">
        <h3 class="text-center">TIM IT SIKAT © 2024 UNDIP, All Right Reserved.</h3>
    </div>
</body>
</html>
