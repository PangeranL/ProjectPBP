<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100">
    <div class="max-w-4xl mx-auto mt-16">
        <!-- Header -->
        <div class="bg-green-700 text-white p-4 rounded-t-lg flex justify-between items-center">
            <h1 class="text-xl font-bold">Verifikasi IRS</h1>
            <button onclick="location.href='/dashboard'" class="bg-white text-green-700 px-4 py-2 rounded">Back</button>
        </div>
        
        <!-- Student Info -->
        <div class="bg-white p-6 rounded-b-lg shadow-md flex items-center">
            <img class="w-16 h-16 rounded-full" src="https://i.pinimg.com/736x/ca/41/96/ca419684a96c3f255a8981444e6b9c89.jpg" alt="Student Avatar">
            <div class="ml-4">
                <h2 class="text-lg font-bold">{{ $student['name'] }}</h2>
                <p>NIM: {{ $student['nim'] }}</p>
            </div>
            <button class="ml-auto bg-gray-200 text-sm px-3 py-1 rounded">KHS</button>
        </div>
        
        <!-- Courses List -->
        <div class="mt-6 grid grid-cols-2 gap-4">
            @foreach($student['courses'] as $course)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold">{{ $course['name'] }} ; {{ $course['code'] }} ; {{ $course['sks'] }} SKS</h3>
                <p class="text-sm text-gray-600">{{ $course['time'] }} ; {{ $course['room'] }}</p>
                <p class="text-sm text-gray-600">{{ $course['lecturer'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Actions -->
        <div class="mt-6 flex justify-center space-x-4">
            <button class="bg-red-600 text-white px-6 py-2 rounded">Tolak</button>
            <button class="bg-green-600 text-white px-6 py-2 rounded">Setuju</button>
        </div>
    </div>
</body>
</html>