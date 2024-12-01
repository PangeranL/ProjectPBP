<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Buat Jadwal Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{asset('/css/dashboard.css')}}" rel="stylesheet">

    <style>
        table, th, td{
            border: 1px solid;
            border-color : #000000;
        }
    </style>
</head>
<body class="bg-gray-100" style = "overflow: hidden">
    <div class="flex flex-col md:flex-row">
<!-- Sidebar -->
        <div class="w-full md:w-1/4 h-full md:h-screen p-5 flex flex-col" style = "background-color: #80AF81">
            <div class="flex ">
                    <img src="/images/logo.png"  class="w-20 h-20 object-cover" >
                    <div class="flex flex-col items-center justify-center">
                        <div class="text-4 text-white text-2xl spac font-bold">SIKAT UNDIP</div>
                        <div class=" h-[9px] border w-full bg-black"></div>
                        <div class="text-white text-xs mb-8 text-center">Sistem Informasi Kuliah Akademik Terpadu<br>Universitas Diponegoro</div>
                    </div>
            </div>
            <nav class="space-y-4 text-white text-lg">
                <a href="/Dashboard" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/dashboard.png">
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/profil.png">
                    <span>Profil</span>
                </a>

                <a href="/kaprodi/inputMK" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" alt="">
                    <span>Input Mata Kuliah</span>
                </a>
                <a href="/kaprodi/inputJD" class="flex items-center space-x-2 hover:bg-green-400 p-2 rounded">
                    <img src="/images/table.png" alt="">
                    <span>Input Jadwal Kuliah</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="text-3xl font-semibold mb-8" style="color: #508D4E">Tabel Input Mata Kuliah</div>
            <div class="p-5 rounded-lg mb-8" style = "background-color: #D6EFD8; height: 692px">
                <div class="flex justify-between">
                    <div class="font-semibold" style="color: #508D4E; margin-left: 5px; width: 200px">Semester
                        <select name="" id="" style="width: 30%; margin-left: 46px; margin-top: 10px">
                            <option value="">1</option>
                            <option value="">2</option></option>
                        </select>
                    </div>
                    <a href="/kaprodi/inputMK/create" class="bg-green-800 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full" style="margin-top: 10px">TAMBAH</a>
                </div>
                
                <table class="w-full border text-center table-auto" style="margin-top: 10px">
                     <thead class="bg-teal-700" style="color: #00000">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Mata Kuliah</th>
                            <th class="border px-4 py-2">Kode Mata Kuliah</th>
                            <th class="border px-4 py-2">SKS</th>
                            <th class="border px-4 py-2">Dosen Pengampu</th>
                        </tr>
                    </thead>
                <tbody>
                    @forelse($mataKuliah as $key =>$value)
                    <tr>
                        <td class="border px-4 py-2">{{$key + 1}}</td>
                        <td class="border px-4 py-2">{{$value -> namaMK}}</td>
                        <td class="border px-4 py-2">{{$value -> kodeMK}}</td>
                        <td class="border px-4 py-2">{{$value -> sks}}</td>
                        <td class="border px-4 py-2">{{$value -> dosen1 -> name ?? ''}} <br>
                                                     {{$value -> dosen2 -> name ?? ''}}
                                                     {{$value -> dosen3 -> name ?? ''}}
                    </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
                </table>
            </div>       
        </div>
    </div>
</body>
</html>
