<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pengajuan Ruang Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Agar footer selalu berada di bawah */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body class="bg-[#D6EFD8]">
    <!-- Header -->
    <header class="bg-[#508D4E] text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">UNIVERSITAS DIPONEGORO</h1>
        <div class="flex items-center">
            <span class="mr-4 font-semibold">Smith Welson</span>
            <img class="w-12 h-12 rounded-full" src="image/SW2.png" alt="User Avatar">
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Title Section -->
        <div class="flex items-center justify-between px-6 mt-10">
            <a href="/bagianAkademik/list_ruang_kuliah" class="text-lg font-semibold ml-5 text-gray-700">< Kembali</a>
            <h1 class="text-3xl font-bold text-center flex-grow mr-16">LIST PENGAJUAN RUANG KULIAH</h1>
        </div>

        <!-- Table Wrapper -->
        <div class="bg-[#D9D9D9] rounded-lg shadow-md p-2 mb-2 w-3/4 mt-10 mx-auto">
            @csrf
            <!-- Header -->
            <div class="flex justify-between items-center text-black font-semibold text-sm">
                <div class="w-1/4 text-center">Departemen</div>
                <div class="w-1/4 text-center">Kode Ruang</div>
                <div class="w-1/4 text-center">Kuota</div>
                <div class="w-1/4 text-center">Status</div>
            </div>
        </div>
        
        <div class="bg-[#ffffff] rounded-lg shadow-md p-4 w-3/4 mt-10 mx-auto">
            <!-- Table Data -->
            @foreach ($reqRuangs as $reqRuang)
                <div class="flex justify-between items-center text-black text-sm py-2 mt-5">
                    <div class="w-1/4 text-center">{{ $reqRuang->prodi }}</div>
                    <div class="w-1/4 text-center">{{ $reqRuang->nama }}</div>
                    <div class="w-1/4 text-center">{{ $reqRuang->kuota }}</div>
                    <div class="w-1/4 text-center">
                        @if($reqRuang->status == 'diterima' || $reqRuang->status == 'ditolak')
                        <span class="px-2 py-1 container rounded-lg text-sm font-bold
                    
                        {{ strtolower($reqRuang->status) == 'diterima' ? 'bg-green-500 text-white' : '' }}
                        {{ strtolower($reqRuang->status) == 'ditolak' ? 'bg-red-500 text-white' : '' }}">
                        {{ ucfirst($reqRuang->status) }}
                    </span>
                        @else
                            <!-- Form untuk setujui dan tolak -->
                            <form action="{{ route('ruang.updateStatus', $reqRuang->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Tombol Setujui -->
                                <button type="submit" name="status" value="diterima" class="px-4 py-2 bg-green-500 text-white rounded-lg mr-2">Setujui</button>
                                <!-- Tombol Tolak -->
                                <button type="submit" name="status" value="ditolak" class="px-4 py-2 bg-red-500 text-white rounded-lg">Tolak</button>
                            </form>
                        @endif
                        
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
