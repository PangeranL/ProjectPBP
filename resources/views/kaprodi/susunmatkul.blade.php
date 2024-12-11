<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKAT - Pengaturan Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{asset('/css/dashboard.css')}}" rel="stylesheet">
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
            <div class="text-3xl font-semibold mb-8" style="color: #508D4E">Mengatur Ketentuan Mata Kuliah</div>
            <div class="p-5 rounded-lg mb-8" style = "background-color: #D6EFD8; height: 692px">
                <div class="flex justify-between; items-center" style="margin-left: 5px; width:37%">
                    <img src="/images/atur.png" style="width: 35px" alt="">
                    <p class="font-semibold" style="color: #508D4E; font-size: 20px; margin-left: 5px">Pengaturan Ketentuan Mata Kuliah</p>
                </div>
                <div class="w-full h-1 mt-4" style="border: 2px solid #508D4E;"></div>
                
                <div>
                    <form action="/kaprodi/inputMK" method="POST">
                        @csrf
                        <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Semester
                        <input type="number" name="semester" id="semester" style="margin-left: 126px; width: 30%">
                            @error('semester')
                                <div>{{$message}}</div>
                            @enderror
                        </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Mata Kuliah
                    <input type="text" name="namaMK" id="namaMK" style="margin-left: 110px; width: 30%">
                        @error('namaMK')
                            <div>{{$message}}</div>
                        @enderror
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Kode Mata Kuliah
                    <input type="text" name="kodeMK" id="kodeMK" style="margin-left: 67px; width: 30%">
                        @error('kodeMK')
                            <div>{{$message}}</div>
                        @enderror
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">
                        Jumlah SKS
                        <input type="number" name="sks" id="sks" style="margin-left: 107.5px; width: 30%" min="1">
                        @error('sks')
                            <div>{{$message}}</div>
                        @enderror
                    </div>
                    <div class="font-semibold" style="color: #508D4E; margin-top: 30px; margin-left: 5px;">Dosen Pengampu
                        <select name="nidn_dosen1" id="nidn_dosen1" style="width: 30%; margin-left: 65px">
                        @forelse ($dosens as $item)
                        <option value="{{$item -> nidn}}">{{$item -> name}}</option>
                        @empty
                        @endforelse
                        </select>
                        @error('nidn_dosen1')
                            <div>{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="font-semibold" style="color: #508D4E; margin-top: 15px; margin-left: 5px;">
                        <select name="nidn_dosen2" id="nidn_dosen2" style="width: 30%; margin-left: 202px">
                        @forelse ($dosens as $item)
                        <option value="{{$item -> nidn}}">{{$item -> name}}</option>
                        @empty
                        @endforelse
                        </select>
                        @error('nidn_dosen2')
                            <div>{{$message}}</div>
                        @enderror
                    </div>

                    <div class="font-semibold" style="color: #508D4E; margin-top: 15px; margin-left: 5px;">
                        <select name="nidn_dosen3" id="nidn_dosen3" style="width: 30%; margin-left: 202px">
                        @forelse ($dosens as $item)
                        <option value="{{$item -> nidn}}">{{$item -> name}}</option>
                        @empty
                        @endforelse
                        </select>
                        @error('nidn_dosen3')
                            <div>{{$message}}</div>
                        @enderror
                    </div>

                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-2" style="margin-left:10px; margin-top: 40px"> 
                        <div class="flex justify-between" style="width:12.5%">
                            <button type="submit" class="bg-green-800 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full">SIMPAN</button>
                        </div>
                    </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>
