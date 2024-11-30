<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Status Akademik</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Tambahkan jika Anda menggunakan Tailwind atau CSS lainnya -->
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold">Pilih Status Akademik</h1>
        <p class="mt-2">
            <strong>Aktif:</strong> Mengikuti kegiatan kuliah dan mengisi IRS.<br>
            <strong>Cuti:</strong> Berhenti kuliah sementara tanpa kehilangan status mahasiswa.
        </p>

        <div class="mt-5 flex space-x-4">
            <!-- Tombol untuk Mengubah Status ke Aktif -->
            <form action="{{ route('herregistrasi.setAktif') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Set Aktif</button>
            </form>

            <!-- Tombol untuk Mengubah Status ke Cuti -->
            <form action="{{ route('herregistrasi.setCuti') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Set Cuti</button>
            </form>

            <!-- Tombol untuk Membatalkan Status -->
            <form action="{{ route('herregistrasi.batalkanStatus') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Batalkan Status</button>
            </form>
        </div>
    </div>
</body>
</html>
